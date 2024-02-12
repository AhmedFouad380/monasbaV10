<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ChatResource;
use App\Http\Resources\Api\MessageResource;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function index(Request $request){
//        $validator = Validator::make($request->all(), [
//            'user_id' => 'required|exists:users,id',
//        ]);
//        if (!is_array($validator) && $validator->fails()) {
//            return callback_data(error(), $validator->errors()->first());
//        }
        $result  = Chat::where(function ($q){
            $q->where('user_id',Auth::guard('user')->user()->id)->Orwhere('provider_id',Auth::guard('user')->user()->id);
        })->whereHas('Provider',function ($q){
            $q->where('deleted_at',null);
        })->
        whereHas('User',function ($q){
            $q->where('deleted_at',null);
        });

        $data = ChatResource::collection($result->paginate(10))->response()->getData(true);

        return callback_data(success(),'success_response',$data);


    }
    public function getChat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        if(isset($request->product_id)){
            $product = Product::find($request->product_id);
            $chat = Chat::where('product_id',$request->product_id)->with('User','Profile')->first();
//        $chat  = Chat::where(function ($q) use ($request){
//            $q->where('user_id',Auth::guard('user')->user()->id)->where('provider_id',$request->user_id);
//        })->OrWhere(function ($q)use ($request){
//            $q->where('user_id',$request->user_id)->where('provider_id',Auth::guard('user')->user()->id);
//        })->first();
            if(isset($chat)){
                $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
                $data['chat']=ChatResource::make($chat);
                $data['message']=$messages;
                Message::where('chat_id',$chat->id)->where('sender_id','!=',Auth::guard('user')->user()->id)->update(['is_read'=>1]);
                return callback_data(success(),'success_response',$data);
            }else{
                $chat = Chat::create([
                    'user_id'=>Auth::guard('user')->user()->id,
                    'product_id'=>$product->id,
                    'provider_id'=>$product->user_id,
                ]);
                $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
                $data['chat']=ChatResource::make($chat);
                $data['message']=$messages;
                return callback_data(success(),'success_response',$data);
//            return callback_data(error(), 'errors');
            }
        }else{
//            $product = Product::find($request->product_id);
//            $chat = Chat::where('product_id',$request->product_id)->first();
            $chat  = Chat::where(function ($q) use ($request){
                $q->where('user_id',Auth::guard('user')->user()->id)->where('provider_id',$request->user_id);
            })->OrWhere(function ($q)use ($request){
                $q->where('user_id',$request->user_id)->where('provider_id',Auth::guard('user')->user()->id);
            })->with('User','Provider')->first();
            if(isset($chat)){
//                Message::where('chat_id',$chat->id)->orderBy('id','desc')->update(['is_read'=>1]);
                $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
                $data['chat']=ChatResource::make($chat);
                $data['message']=$messages;
                Message::where('chat_id',$chat->id)->where('sender_id','!=',Auth::guard('user')->user()->id)->update(['is_read'=>1]);
                return callback_data(success(),'success_response',$data);
            }else{
                $chat = Chat::create([
                    'user_id'=>Auth::guard('user')->user()->id,
                    'provider_id'=>$request->user_id,
                ]);

                $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
                $data['chat']=ChatResource::make($chat);
                $data['message']=$messages;
                return callback_data(success(),'success_response',$data);
            }
        }

    }

    public function getChat2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
//         if(isset($request->product_id)){
//             $product = Product::find($request->product_id);
//             $chat = Chat::where('product_id',$request->product_id)->with('User','Profile')->first();
// //        $chat  = Chat::where(function ($q) use ($request){
// //            $q->where('user_id',Auth::guard('user')->user()->id)->where('provider_id',$request->user_id);
// //        })->OrWhere(function ($q)use ($request){
// //            $q->where('user_id',$request->user_id)->where('provider_id',Auth::guard('user')->user()->id);
// //        })->first();
//             if(isset($chat)){
//                 $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
//                 $data['chat']=ChatResource::make($chat);
//                 $data['message']=$messages;
//                 return callback_data(success(),'success_response',$data);
//             }else{
//                 $chat = Chat::create([
//                     'user_id'=>Auth::guard('user')->user()->id,
//                     'product_id'=>$product->id,
//                     'provider_id'=>$product->user_id,
//                 ]);
//                 $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
//                 $data['chat']=ChatResource::make($chat);
//                 $data['message']=$messages;
//                 return callback_data(success(),'success_response',$data);
// //            return callback_data(error(), 'errors');
//             }
//         }else{
//            $product = Product::find($request->product_id);
//            $chat = Chat::where('product_id',$request->product_id)->first();
        $chat  = Chat::where(function ($q) use ($request){
            $q->where('user_id',Auth::guard('user')->user()->id)->where('provider_id',$request->user_id);
        })->OrWhere(function ($q)use ($request){
            $q->where('user_id',$request->user_id)->where('provider_id',Auth::guard('user')->user()->id);
        })->with('User','Provider')->first();
        if(isset($chat)){
            Message::where('chat_id',$chat->id)->where('sender_id','!=',Auth::guard('user')->user()->id)->update(['is_read'=>1]);
            $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->get());
            $data['chat']=ChatResource::make($chat);
            $data['message']=$messages;
            return callback_data(success(),'success_response',$data);
        }else{
            $chat = Chat::create([
                'user_id'=>Auth::guard('user')->user()->id,
                'provider_id'=>$request->user_id,
            ]);

            $messages = MessageResource::collection(Message::where('chat_id',$chat->id)->orderBy('id','desc')->paginate(10));
            $data['chat']=ChatResource::make($chat);
            $data['message']=$messages;
            return callback_data(success(),'success_response',$data);
            // return callback_data(error(), 'errors');
        }
        // }

    }
    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chat_id' => 'required|exists:chats,id',
            'message' => 'required_if:type,text',
            'voice' => 'required_if:type,voice',
            'file' => 'required_if:type,file',
            'images' => 'required_if:type,image',
            'lat' => 'required_if:type,location',
            'lng' => 'required_if:type,location',
            'type' => 'required:in:text,voice,location,file,contact,image',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        if($request->type == 'image'){
            if(is_array($request->images)){
                foreach($request->images as $img){
                    $data = Message::create([
                        'chat_id' => $request->chat_id,
                        'sender_id' => Auth::guard('user')->id(),
                        'message' => $request->message,
                        'voice' => $request->voice,
                        'file' => $img,
                        'lat' => $request->lat,
                        'lng' => $request->lng,
                        'type' => $request->type,
                    ]);
                }
            }
        }else{
            $data = Message::create([
                'chat_id' => $request->chat_id,
                'sender_id' => Auth::guard('user')->id(),
                'message' => $request->message,
                'voice' => $request->voice,
                'file' => $request->file,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'type' => $request->type,
            ]);
        }
        $data->created_at = \Carbon\Carbon::parse($data->created_at)->format('Y-m-d H:i');
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data =  MessageResource::make($data);
        $b = $pusher->trigger('MessageSent-channel-' . $request->chat_id, 'App\Events\chatEvent', $data);

        $chat = Chat::find($request->chat_id);
        $tokens = [];
        if($chat->user_id == Auth::guard('user')->id()){
            $user = User::find($chat->provider_id);
        }else{
            $user = User::find($chat->user_id);
        }

        $title = 'مناسبة';
        $type = 'chat';
        $message= 'تم ارسال رساله جديدة من قبل '. Auth::guard('user')->user()->name;
        $message_en= 'A new message has already been sent '. Auth::guard('user')->user()->name;
        Notification::create([
            'name_ar'=>$message,
            'name_en'=>$message_en,
            'user_id'=>$user->id,
            'chat_id'=>$request->chat_id,
            'type'=>$type

        ]);
        if(isset($user->fcm_token)){
            $tokens[]=$user->fcm_token;
          $log =  send($tokens ,$title ,$message,Auth::guard('user')->user()->id ,$type);
        }
        dd($user->fcm_token);


        return callback_data(success(), 'save_success', $data);

    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'ids' => 'array',
            'ids.*' => 'exists:chats,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data = Chat::whereIn('id',$request->ids)->delete();

        return callback_data(success(), 'deleted_s', $data);

    }

    public function deleteMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'ids' => 'array',
            'ids.*' => 'exists:messages,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data = Message::whereIn('id',$request->ids)->delete();

        return callback_data(success(), 'deleted_s', $data);

    }

    public function blackChat(Request $request){
        $validator = Validator::make($request->all(), [
            'chat_id' => 'required',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data = Chat::where('id',$request->chat_id)->update([
            'is_block' => 1,
            'blocked_by'=>Auth::guard('user')->user()->id
        ]);

        return callback_data(success(), 'block_s', null);

    }
}
