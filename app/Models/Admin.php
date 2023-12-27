<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function scopeActive($query): void
    {
        $query->where('status', 'active');
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/admin/' . $image);
//            return asset('uploads/admin') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads' . '/' . 'admin/',$image,'s3');
//            $image->move(public_path('/uploads/admin/'), $img_name);
            $this->attributes['image'] = $img_name;
        }
    }
}
