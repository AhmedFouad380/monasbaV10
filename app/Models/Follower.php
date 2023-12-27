<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Profile(){
        return $this->belongsTo(User::class,'profile_id');
    }
}
