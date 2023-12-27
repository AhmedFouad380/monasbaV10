<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function replies(){
        return $this->hasMany( Comment::class ,'parent_id');
    }
}
