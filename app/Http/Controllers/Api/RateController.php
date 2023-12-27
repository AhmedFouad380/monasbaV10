<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Http\Requests\Api\RateRequest;
use App\Http\Resources\Api\CommentResource;
use App\Http\Resources\Api\RateResource;
use App\Models\Comment;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:users,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $result = Rate::OrderBy('id', 'desc')->where('profile_id',$request->profile_id);


        $data = RateResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function storeRate(RateRequest $request){

        $data = $request->validated();
        $data['user_id']=Auth::guard('user')->user()->id;

        Rate::create($data);

        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function DeleteRate(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:rates,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Rate::whereId($request->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }
}
