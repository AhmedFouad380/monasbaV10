<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FollowRequest;
use App\Http\Requests\Api\RateRequest;
use App\Http\Resources\Api\FollowerResource;
use App\Http\Resources\Api\ProductsResource;
use App\Models\Follower;
use App\Models\NotifyFollower;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FollowerController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:users,id',
            'type' => 'required|in:following,followers',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        if($request->type == 'followers'){
            $data = Follower::where('profile_id',$request->profile_id);

        }else{
           $data = Follower::where('user_id',$request->profile_id);
        }
//        $data['type']= $request->type;

        $data = FollowerResource::collection($data->paginate(10))->additional([
            'type' => $request->type,
        ])->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());


    }
    public function storeFollower(FollowRequest $request){

        $data = $request->validated();
        $data['user_id']=Auth::guard('user')->user()->id;

        Follower::create($data);

        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function DeleteFollower(Request $request){

        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:users,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Follower::where('profile_id',$request->profile_id)->where('user_id',Auth::guard('user')->user()->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }
    public function storeNotify(FollowRequest $request){

        $data = $request->validated();
        $data['user_id']=Auth::guard('user')->user()->id;

        NotifyFollower::create($data);

        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function deleteNotify(Request $request){

        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:users,id',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        NotifyFollower::where('profile_id',$request->profile_id)->where('user_id',Auth::guard('user')->user()->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }
}
