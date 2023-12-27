<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment'=>$this->comment,
            'user_id'=>$this->User ? $this->User->id : null ,
            'user_image'=>$this->User ? $this->User->image : null ,
            'user_name'=>$this->User ? $this->User->name : null ,
            'date'=>Carbon::parse($this->created_at)->format('Y-m-d H:i'),
            'is_verified'=>$this->User->verified ? 1 : 0,
            'replies'=>$this->replies ? CommentResource::collection($this->replies) : null
        ];
    }
}
