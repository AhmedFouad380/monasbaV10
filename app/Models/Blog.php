<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $appends = ['title','description'];

    public function getTitleAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->title_ar;
        } else {
            return $this->title_en;
        }
    }
    public function getDescriptionAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->description_ar;
        } else {
            return $this->description_en;
        }
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/blogs/' . $image);
//            return asset('uploads/admin') . '/' . $image;
        }else{
            return asset('defaults/user_default.png');
        }
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = '1000' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
//            $path = $img_name->storePublicly('images', 's3');
//            $image->storePublicly('images/', $img_name, 's3');
            $image->storeAs('uploads/blogs', $img_name, 's3');

//            $image->move(public_path('/uploads/admin/'), $img_name);
            $this->attributes['image'] = $img_name;
        }
    }


}
