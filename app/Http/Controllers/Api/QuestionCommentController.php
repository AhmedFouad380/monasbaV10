<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Http\Requests\Api\QuestionCommentRequest;
use App\Http\Requests\Api\QuestionRequest;
use App\Http\Resources\Api\CommentResource;
use App\Http\Resources\Api\QuestionCommentResource;
use App\Http\Resources\Api\QuestionResource;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\QuestionComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionCommentController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required|exists:questions,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $result = QuestionComments::OrderBy('id', 'asc')->where('question_id',$request->question_id)->where('parent_id',null);

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('comment', 'like', '%' . $request->search . '%');
            });
        }
        $data = QuestionCommentResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }


    public function storeQuestionComment(QuestionCommentRequest $request){

        $data = $request->validated();
        $data['user_id']=Auth::guard('user')->user()->id;

        $result = QuestionComments::create($data);
//        if(isset($request->parent_id)){
//            $comment = QuestionComments::find($request->parent_id);
//                // Notifcation For follwers
//            $tokens = [];
//            $notifcation = Notification::create([
//                'name_ar'=>'تم الرد على تعليقك من قبل '. Auth::guard('user')->user()->name,
//                'name_en'=>'A new reply for your comment from  '. Auth::guard('user')->user()->name,
////                'question_id'=>$result->question_id,
//                'user_id'=>$comment->user_id,
//            ]);
//            $tokens[]=$comment->User->fcm_token;
//            send($tokens,'Monsaba',$notifcation['name_ar'],$result->id );
//            // end notifcation
//        }
        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function DeleteQuestionComment(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:question_comments,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        QuestionComments::whereId($request->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }

}
