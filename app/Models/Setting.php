<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $appends = ['name','terms','about'];

    public function getNameAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }
    public function getTermsAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->terms_ar;
        } else {
            return $this->terms_en;
        }
    }

    public function getAboutAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->about_ar;
        } else {
            return $this->about_en;
        }
    }

    public function getLogoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Setting') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setLogoAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'logo_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/Setting/'), $img_name);
            $this->attributes['logo'] = $img_name;
        }
    }

}
