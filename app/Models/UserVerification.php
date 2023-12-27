<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserVerification extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/UserVerification/' . $image);
//            return asset('uploads/UserVerification') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setFileAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/UserVerification/', $img_name, 's3');
//            $image->move(public_path('/uploads/UserVerification/'), $img_name);
            $this->attributes['file'] = $img_name;
        }
    }


    public function Country(){
        return $this->belongsTo(Country::class,'country_id');
    }


    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

}
