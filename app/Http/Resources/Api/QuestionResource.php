<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'description'=>$this->description,
            'user_name'=>$this->User ?  $this->User->name : null,
            'user_image'=>$this->User ?  $this->User->image : null,
            'user_id'=>$this->User ?  $this->User->id : null ,
            'is_verified'=>$this->User->verified ? 1  : 0 ,
            'date'=>Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            'count_comments'=>count($this->Comments)

        ];
    }
}
