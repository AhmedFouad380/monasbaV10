<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ProfileUpdateRequest;
use App\Http\Requests\Api\User\ResendVerifyPhoneRequest;
use App\Http\Requests\Api\User\UserLoginRequest;
use App\Http\Requests\Api\User\UserRequest;
use App\Http\Requests\Api\User\VerifyPhoneRequest;
use App\Http\Resources\Api\CitiesResource;
use App\Http\Resources\Api\CountriesResource;
use App\Http\Resources\Api\User\UserResource;
use App\Mail\VerifyPhone;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        $credentials = $request->only( 'phone', 'password');
//        $phone = $request->country_code.$request->phone;
        $phone = $request->phone;
        $token = Auth::guard('user')->attempt($credentials);
        if (!$token) {
                return msg(false, trans('lang.invalid_account'), failed());
        }
        if (Auth::guard('user')->user()->email_verified_at == null) {
            auth('user')->logout();
            return msg(false, trans('lang.verify_phone_first'), 401);
        }
        $result['token'] = $token;
        $result['client_data'] = UserResource::make(Auth::guard('user')->user()) ;
        $result['country'] = Auth::guard('user')->user()->Country ?CountriesResource::make(Auth::guard('user')->user()->Country)  : null;
        $result['city'] =  Auth::guard('user')->user()->City ? CitiesResource::make(Auth::guard('user')->user()->City) : null;
        $result['state'] = Auth::guard('user')->user()->State ?CitiesResource::make(Auth::guard('user')->user()->State) : null;
//        update fcm_token if sent it
        if (isset($data['fcm_token'])) {
            Auth::guard('user')->user()->update(['fcm_token' => $data['fcm_token']]);
        }
        return msgdata(true, trans('lang.login_s'), $result, success());
    }

    public function register(UserRequest $request)
    {

        $dataa = $request->validated();
        $dataa['status'] = Setting::find(1)->user_status;
        $phone = $dataa['phone'];
//        unset($data['phone']);
//        $data['phone'] = $phone;
        $user = User::create($dataa);
        //sending otp to user
        $otp= \Otp::generate($phone);
        if (env('APP_ENV') == 'local') {
            $otp = "9999";
        }
        $result['otp'] = $otp;

        $data = $otp;
        Mail::to($dataa['email'])->send(new VerifyPhone($data));

        return msgdata(true, trans('lang.sign_up_success'), $result, success());
    }

    public function verifyPhone(VerifyPhoneRequest $request)
    {
        $data = $request->validated();

        $phone =  $data['phone'];

            $validated_otp = \Otp::validate($phone, $data['otp']);

            if ($validated_otp->status == true) {
                $client = User::where('phone', $data['phone'])->first();
                if ($client) {
                    $client->email_verified_at = Carbon::now();
                    $client->save();
                    return msg(true, trans('lang.phone_verified_s'), success());
                } else {
                    return msg(false, trans('lang.client_not_found'), failed());
                }
            } else {
                return msg(false, trans('lang.otp_invalid'), failed());

            }
        }


    public function resendVerifyPhone(ResendVerifyPhoneRequest $request)
    {
        $data = $request->validated();

        $phone = $data['phone'];
        $client = User::where('phone',$data['phone'])->first();
        $otp = \Otp::generate($phone);
        if (env('APP_ENV') == 'local') {
            $otp = "9999";
        }
        $result['otp'] = $otp;
        $data = $otp;
        //TODO :send sms to phone number ...
        //Smsmisr::send("كود التحقق الخاص بك هو: " . $otp, $request->phone, null, 2);
        //sendSMS2($request->phone,$otp);
        //end sending
//        dd($client->email);
        Mail::to($client->email)->send(new VerifyPhone($data));


        return msgdata(true, trans('lang.code_send_again_s'), $result, success());
    }

    public function profile()
    {
        $client = (new UserResource(Auth::guard('user')->user()));

        return msgdata(true, trans('lang.data_display_success'), $client, success());
    }
    public function UserProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_id' => 'nullable|exists:users,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $client = (new UserResource(User::find($request->profile_id)));

        return msgdata(true, trans('lang.data_display_success'), $client, success());
    }
    public function searchProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'nullable',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $client =  User::OrderBy('id','asc');
        if(isset($request->search)){
            $client->where('name','like','%'.$request->search.'%');
        }
        $data = UserResource::collection($client->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        $data = $request->validated();
        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = upload($data['image'], 'clients_images');
        }
        if (isset($data['cover']) && is_file($data['cover'])) {
            $data['cover'] = upload($data['cover'], 'clients_images');
        }
        User::where('id', \auth('user')->user()->id)->update($data);
        return msg(true, trans('lang.data_updated_s'), success());
    }






    /**
     * Write code on Method
     *
     * @return response()
     */

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'country_code' => 'required|string',
            'phone' => 'required|exists:users,phone',
        ]);

        $token = rand(1000, 9999);

        DB::table('user_password_rest')->insert([
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        //TODO will make here send sms to client phone ...

        //  Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //   $message->subject('Reset Password');
        //    });
        $result['otp'] = (string)$token;
//        Mail::to($client->email)->send(new VerifyPhone($result['otp']));

        return msgdata(true, trans('lang.email_sent'), $result, success());
    }
    /**
     * Write code on Method
     *
     * @return response()
     */

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'country_code' => 'required|string',
            'phone' => 'required|exists:users,phone',
            'token' => 'required|numeric',
        ]);
        $updatePassword = DB::table('user_password_rest')
            ->where([
                'country_code' => $request->country_code,
                'phone' => $request->phone,
                'token' => $request->token
            ])
            ->first();
        if (!$updatePassword) {
            return msgdata(true, trans('lang.token_invalid'), (object)[], failed());
        }
        $client = User::where('phone', $request->phone)->first();
            $token = auth('user')->login($client);
            if (!$token) {
                return msg(false, trans('lang.unauthorized'), failed());
            }
            $result['token'] = $token;
            $result['client_data'] = Auth::guard('user')->user();
            DB::table('user_password_rest')->where(['phone' => $request->phone])->delete();
            return msgdata(true, trans('lang.possword_rest'), $result, success());

    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $client = auth('user')->user();
        if ($request->old_password) {
            if ($request->old_password) {
                $old_password = Hash::check($request->old_password, $client->password);
                if ($old_password != true) {
                    return msg(false, trans('lang.old_passwordError'), failed());
                }
            }
        }
        User::where('id', $client->id)
            ->update(['password' => bcrypt($request->password)]);
        return msg(true, trans('lang.password_changed_s'), success());
    }

    public function logout(Request $request)
    {
        User::find(auth('user')->id())->update(['fcm_token'=>null]);
        auth('user')->logout();
        return msg(true, trans('lang.logout_s'), success());
    }
    public function delete(Request $request){

        $array = array('deleted_at'=>Carbon::now());
         User::where('id',Auth::guard('user')->user()->id)->update($array);
        return msg(true, trans('lang.deleted_s'), success());

    }

    public function changeCountry(Request $request){
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|exists:countries,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $user = Auth::guard('user')->user();
        $user->country_id=$request->country_id;
        $user->save();

        return msg(true, trans('lang.updated_s'), success());

    }
    public function changePhone(Request $request){
        $validator = Validator::make($request->all(), [
            'country_code'=>'required',
            'phone' => 'required|unique:users,phone,'.Auth::guard('user')->user()->id,
        ]);

        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $token = rand(1000, 9999);
        DB::table('user_password_rest')->insert([
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        //TODO will make here send sms to client phone ...

        //  Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //   $message->subject('Reset Password');
        //    });
        $result['otp'] = (string)$token;

        return msgdata(true, trans('lang.updated_s'), $result['otp'] ,success());
    }
    public function ConfirmChangePhone(Request $request){
        $validator = Validator::make($request->all(), [
            'country_code'=>'required',
            'phone' => 'required|unique:users,phone,'.Auth::guard('user')->user()->id,
            'token'=>'required',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $updatePhone = DB::table('user_password_rest')
            ->where([
                'country_code' => $request->country_code,
                'phone' => $request->phone,
                'token' => $request->token
            ])
            ->first();
        if (!$updatePhone) {
            return msgdata(true, trans('lang.token_invalid'), (object)[], failed());
        }
        $user = Auth::guard('user')->user();
        $user->phone=$request->phone;
        $user->save();

        return msgdata(true, trans('lang.updated_s') ,null,success());
    }
    public function updateStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'is_active' => 'required|in:1,0',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $user = Auth::guard('user')->user();
        $user->is_active=$request->is_active;
        $user->save();

        return msg(true, trans('lang.updated_s'), success());

    }


    public function removeImage(Request $request){
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:image,cover',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        if($request->type == 'image'){
            User::where('id',Auth::guard('user')->user()->id)->update(['image'=>null]);
        }elseif($request->type == 'cover'){
            User::where('id',Auth::guard('user')->user()->id)->update(['cover'=>null]);
        }
        return msg(true, trans('lang.deleted_s'), success());

    }
}
