<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComments extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Question(){
        return $this->belongsTo(Question::class,'question_id');
    }
    public function replies(){
        return $this->hasMany( QuestionComments::class ,'parent_id');
    }
}
