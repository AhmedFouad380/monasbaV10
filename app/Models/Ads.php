<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Ads extends Model
{

    use HasFactory , SoftDeletes ;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/ads/'.$image);
//            return asset('uploads/admin') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/ads/',$img_name,'s3');
//            $image->move(public_path('/uploads/admin/'), $img_name);
            $this->attributes['image'] = $img_name;
        }
    }}
