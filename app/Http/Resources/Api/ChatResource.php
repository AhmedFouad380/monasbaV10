<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->user_id == Auth::guard('user')->user()->id){
            return  [
                'id'=>$this->id,
                'user_id'=> (int) $this->provider_id ,
                'user_city'=>$this->Provider->City ?  CountriesResource::make($this->Provider->City) : null,
                'user_name'=>$this->Provider->name,
                'user_image'=>$this->Provider->image,
                'is_active'=>$this->Provider->is_active,
                'is_follow'=>$this->Provider->is_follow($this->Provider->id) > 0 ? 1 : 0,
                'is_verified'=>$this->Provider->verified ? 1 : 0,
                'product_id'=>$this->product_id,
                'unread_count'=>$this->unreadMessage ? count($this->unreadMessage) : 0,
                'lastMessage'=>$this->lastMessage ? $this->lastMessage->message : '',
                'date'=>Carbon::parse($this->created_at)->format('Y-m-d'),
                'is_block'=>$this->is_block,

            ];
        }else{
            return  [
                'id'=>$this->id,
                'user_id'=>(int) $this->user_id,
                'user_name'=>$this->User->name,
                'user_city'=>$this->User->City ? CountriesResource::make($this->User->City) : null,
                'user_image'=>$this->User->image,
                'is_active'=>$this->User->is_active,
                'is_follow'=>$this->User->is_follow($this->User->id) > 0 ? 1 : 0,
                'is_verified'=>$this->User->verified ? 1 : 0,
                'product_id'=>$this->product_id,
                'unread_count'=>$this->unreadMessage ? count($this->unreadMessage) : 0,
                'lastMessage'=>$this->lastMessage ? $this->lastMessage->message : '',
                'date'=>Carbon::parse($this->created_at)->format('Y-m-d'),
                'is_block'=>$this->is_block,

            ];
        }

    }
}
