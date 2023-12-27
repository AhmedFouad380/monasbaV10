<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function User(){
        return $this->belongsTo(User::class,'user_id')->with('City');
    }
    public function Profile(){
        return $this->belongsTo(User::class,'profile_id')->with('City');
    }
    public function Provider(){
        return $this->belongsTo(User::class,'provider_id')->with('City');
    }
    public function unreadMessage(){
        return $this->hasMany(Message::class,'chat_id')->where('is_read',0)->where('sender_id','!=',Auth::guard('user')->user()->id);
    }
    public function lastMessage(){
        return $this->hasOne(Message::class,'chat_id')->OrderBy('id','desc');
    }



}
