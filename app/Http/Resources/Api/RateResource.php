<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'rate'=>$this->rate,
            'comment'=>$this->comment,
            'user_id'=>$this->User->id,
            'user_name'=>$this->User->name,
            'user_image'=>$this->User->image,
            'is_verified'=>$this->User->verified ? 1 : 0,
            'date'=>Carbon::parse($this->created_at)->format('Y-m-d H:i'),
        ];
    }
}
