<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class VerificationController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'country_id' => 'required|exists:countries,id',
            'category' => 'required',
            'file'=>'required',
            'type'=>'required|in:person,company',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        UserVerification::create([
            'user_id'=>Auth::guard('user')->user()->id,
            'phone'=>$request->phone,
            'file'=>$request->file,
            'country_id'=>$request->country_id,
            'category'=>$request->category,
            'file_type'=>$request->file_type,
            'type'=>$request->type,
        ]);

        return msgdata(true, trans('lang.added_s'), (object)[] , success());

    }
}
