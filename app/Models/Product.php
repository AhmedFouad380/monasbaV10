<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $appends = ['name','description'];

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->name_ar;
        } else {
            return $this->name_en;
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
            return Storage::disk('s3')->url('uploads/products2/' . $image);
//            return asset('uploads/admin') . '/' . $image;
        }else{
            if($image2 = ProductImages::where('product_id',$this->attributes['id'])-    >first()){
                return $image2->image;
            }else{
                return asset('defaults/user_default.png');
            }
        }
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = '1000' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
//            $path = $img_name->storePublicly('images', 's3');
//            $image->storePublicly('images/', $img_name, 's3');
            $image->storeAs('uploads/products2', $img_name, 's3');

//            $image->move(public_path('/uploads/admin/'), $img_name);
            $this->attributes['image'] = $img_name;
        }
    }


    public function getVideoAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/products/' . $image);
//            return asset('uploads/products') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setVideoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
//            $path = $img_name->storePublicly('images', 's3');

            $image->storeAs('images', $img_name, 's3');
            $this->attributes['video'] = $img_name;
        }
    }

    public function Country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function City(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function State(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }
    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function Comments(){
        return $this->HasMany(Comment::class,'product_id');
    }
    public function images(){
        return $this->HasMany(ProductImages::class,'product_id');
    }


}
