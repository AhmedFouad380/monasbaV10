<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Requests\Api\User\UserRequest;
use App\Http\Requests\Api\UserOldAppRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Country;
use App\Models\Notification;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestoreOldAppData extends Controller
{
    public function register(UserOldAppRequest $request)
    {

        $data = $request->validated();
        $data['uid']=$request->uid;
        $data['status'] = Setting::find(1)->user_status;
//        $phone = $data['country_code'].$data['phone'];
//        unset($data['phone']);
//        $data['phone'] = $phone;
        $user = User::create($data);
        //sending otp to user
//        $phone = $data['country_code'] .$data['phone'];
//        $otp = \Otp::generate($phone);
//        if (env('APP_ENV') == 'local') {
        $otp = "9999";
//        }
        $result['otp'] = $otp;
        return msgdata(true, trans('lang.sign_up_success'), $result, success());
    }

    public function storeProductOldapp(ProductRequest $request){
        $data = $request->validated();
            $data['currency_id'] = Country::find($data['country_id'])->Currency->id;
        if(isset($images)) {
            $images = $data['images'];
            unset($data['images']);
        }
        $user = User::where('uid',$request->uid)->first();
        if(isset($user)){
            $data['user_id']=$user->user_id;
            $data['proid']=$request->proid;
            $result = Product::create($data);
            if(isset($images)){
                foreach($images as $key => $image){
                    ProductImages::create([
                        'product_id'=>$result->id,
                        'image'=>$image,
                    ]);
                }
            }
        }else{
            $user = User::where('phone',$request->user_phone)->first();
            $data['user_id']=$user->id;
            $data['proid']=$request->proid;
            $result = Product::create($data);
            if(isset($images)){
                foreach($images as $key => $image){
                    ProductImages::create([
                        'product_id'=>$result->id,
                        'image'=>$image,
                    ]);
                }
            }
        }

        // Notifcation For follwers
        $tokens = [];
        if(isset(Auth::guard('user')->user()->Notifyfollowers)){
            foreach (Auth::guard('user')->user()->Notifyfollowers as $followers){
                $notifcation = Notification::create([
                    'name_ar'=>'تم اضافة منتج جديد من قبل '. Auth::guard('user')->user()->name,
                    'name_en'=>'A new product has already been added by '. Auth::guard('user')->user()->name,
                    'product_id'=>$result->id,
                    'user_id'=>$followers->id,
                ]);
                $tokens[]=$followers->fcm_token;
            }
            if(isset($notifcation)){
                send($tokens,'Monsaba',$notifcation['title'],$result->id );
            }
        }
        // end notifcation
        $data = ProductResource::make($result);
        return msgdata(true, trans('lang.added_s'), $data, success());

    }

}
