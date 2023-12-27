<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RateRequest;
use App\Http\Resources\Api\NotificationResource;
use App\Http\Resources\Api\RateResource;
use App\Models\Notification;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        Notification::OrderBy('id', 'desc')->where('user_id',Auth::guard('user')->user()->id)->update(['is_read'=>1]);
        $result = Notification::OrderBy('id', 'desc')->where('user_id',Auth::guard('user')->user()->id);

        $data = NotificationResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }


    public function DeleteNotification(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:notifications,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Notification::whereId($request->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }
    public function DeleteAllNotification(Request $request){


        Notification::where('user_id',Auth::guard('user')->user()->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }


}
