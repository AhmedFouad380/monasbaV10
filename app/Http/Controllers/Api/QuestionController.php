<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Http\Requests\Api\QuestionRequest;
use App\Http\Resources\Api\CommentResource;
use App\Http\Resources\Api\QuestionResource;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index(Request $request)
    {

        $result = Question::OrderBy('id', 'desc');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('description', 'like', '%' . $request->search . '%');
            });
        }
        if (isset($request->user_id)) {
                $result->where('user_id',$request->user_id);
        }
        $data = QuestionResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function myQuestions(Request $request)
    {

        $result = Question::OrderBy('id', 'desc')->where('user_id',Auth::guard('user')->id());

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('description', 'like', '%' . $request->search . '%');
            });
        }
        $data = QuestionResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }


    public function storeQuestion(QuestionRequest $request){

        $data = $request->validated();
        $data['user_id']=Auth::guard('user')->user()->id;

        Question::create($data);
        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function DeleteQuestion(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:questions,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Question::whereId($request->id)->delete();

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
