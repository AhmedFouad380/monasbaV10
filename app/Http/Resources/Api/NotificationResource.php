<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Auth;
class NotificationResource extends JsonResource
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
            'name'=>$this->name,
            'type'=>$this->type,
            'user_id'=>(int) $this->UserID($this->chat_id) ? $this->UserID($this->chat_id) : $this->user_id,
            'product_id'=>$this->product_id ? $this->product_id : null,
            'date'=>Carbon::parse($this->created_at)->diffForHumans(),
            'image'=>$this->Product ?  $this->Product->image : asset('logo/logo.png')
        ];
    }
}
