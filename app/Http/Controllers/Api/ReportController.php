<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Comment;
use App\Models\CommentReports;
use App\Models\QuestionComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class ReportController extends Controller
{

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'comment_id' => 'required',
            'description' => 'required',
            'comment_type' => 'required|in:product,question',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        if($request->comment_type == 'product'){
            $data = new CommentReports();
            $data->comment_id=$request->comment_id;
            $data->comment_type=Comment::class;
            $data->description=$request->description;
            $data->user_id=Auth::guard('user')->user()->id;
            $data->save();
        }else{
            $data = new CommentReports();
            $data->comment_id=$request->comment_id;
            $data->comment_type=QuestionComments::class;
            $data->description=$request->description;
            $data->user_id=Auth::guard('user')->user()->id;
            $data->save();
        }

        return msgdata(true, trans('lang.added_s'), (object)[], success());


    }

    public function chatReport(Request $request){

        $validator = Validator::make($request->all(), [
            'chat_id' => 'required',
            'description' => 'required',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

            $data = new CommentReports();
            $data->comment_id=$request->chat_id;
            $data->comment_type=Chat::class;
            $data->description=$request->description;
            $data->user_id=Auth::guard('user')->user()->id;
            $data->save();

        return msgdata(true, trans('lang.added_s'), (object)[], success());


    }



}
