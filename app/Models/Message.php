<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    use HasFactory,SoftDeletes;
//    protected $appends =['sender_name'];
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function Sender(){
        return $this->belongsTo(User::class,'sender_id');
    }

    public function getVoiceAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/chat/' . $image);
//            return asset('uploads/chat') . '/' . $image;
        }
        return null;
    }

    public function setVoiceAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'chat');
            $this->attributes['voice'] = $imageFields;
        }else {
            $this->attributes['voice'] = $image;
        }
    }

    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/chat_files/' . $image);

//            return asset('uploads/chat_files') . '/' . $image;
        }
        return null;
    }

    public function setFileAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'chat_files');
            $this->attributes['file'] = $imageFields;
        }else {
            $this->attributes['file'] = $image;
        }
    }

}
