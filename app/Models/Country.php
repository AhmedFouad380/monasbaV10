<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Currency;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    use HasFactory ,SoftDeletes;

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
    public function getImageAttribute($image)
    {
        if (!empty($image)) {
           return Storage::disk('s3')->url('uploads/Country/' . $image);
//            return asset('uploads/Country') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->StoreAs('/uploads/Country/', $img_name,'s3');
            $this->attributes['image'] = $img_name;
        }else{
            $this->attributes['image'] = $image;
        }
    }
    public function Currency(){
        return $this->hasOne(Currency::class,'country_id');
    }
}
