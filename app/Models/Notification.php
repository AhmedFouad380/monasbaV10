<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Chat(){
        return $this->belongsTo(Chat::class,'chat_id');
    }

    public function UserID($id){
        $chat =  Chat::find($id);
        if(isset($chat)){
            if(Auth::guard('user')->user()->id == $chat->user_id){
                return $chat->provider_id;
            }else{
                return $chat->user_id;
            }
        }
        return null;
    }
}
