<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CommentResource;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsComtroller extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $result = Comment::OrderBy('id', 'asc')->where('product_id',$request->product_id)->where('parent_id',null);

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('comment', 'like', '%' . $request->search . '%');
            });
        }
        $data = CommentResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function commentDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required|exists:comments,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $result = Comment::find($request->comment_id);

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('comment', 'like', '%' . $request->search . '%');
            });
        }
        $data = CommentResource::make($result);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }


    public function storeComment(CommentRequest $request){

        $data = $request->validated();
        $data['user_id']=Auth::guard('user')->user()->id;

        $result = Comment::create($data);
        if(isset($request->parent_id)){
            $comment = Comment::find($request->parent_id);
            // Notifcation For follwers
            $tokens = [];
                $notifcation = Notification::create([
                    'name_ar'=>'تم الرد على تعليقك من قبل '. Auth::guard('user')->user()->name,
                    'name_en'=>'A new reply for your comment from  '. Auth::guard('user')->user()->name,
                    'product_id'=>$result->Product->id,
                    'user_id'=>$comment->User->id,
                    'type'=>'product'
                ]);
                $tokens[]=$comment->User->fcm_token;
            send($tokens ,'مناسبة' ,$notifcation['name_ar'],$result->Product->id,'product');
            // end notifcation
        }else{
            $tokens = [];
            $notifcation = Notification::create([
                'name_ar'=>'تم الرد على منشورك من قبل '. Auth::guard('user')->user()->name,
                'name_en'=>'A new reply for your post from  '. Auth::guard('user')->user()->name,
                'product_id'=>$result->Product->id,
                'user_id'=>$result->Product->User->id,
                'type'=>'product'
            ]);
            $tokens[]=$result->Product->User->fcm_token;
            send($tokens ,'مناسبة' ,$notifcation['name_ar'],$result->Product->id,'product');

        }
        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function DeleteComment(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:comments,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Comment::whereId($request->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }

    public function ReportComment(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:comments,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Comment::whereId($request->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }
}
