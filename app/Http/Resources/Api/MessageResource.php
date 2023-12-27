<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->sender_id == Auth::guard('user')->user()->id){
            return [
                'id' => $this->id,
                'message' => $this->message,
                'sender_id' => $this->sender_id,
                'sender_name'=>$this->Sender->name,
                'sender_image'=>$this->Sender->image,
                'sender_type'=>'user',
                'voice'=>$this->voice,
                'file'=>$this->file,
                'type'=>$this->type,
                'lat'=>$this->lat,
                'lng'=>$this->lng,
                'is_read'=>$this->is_read,
                'created_at'=>\Carbon\Carbon::parse($this->created_at)->diffForHumans(),
            ];
        }else{
            return [
                'id' => $this->id,
                'message' => $this->message,
                'sender_id' => $this->sender_id,
                'sender_name'=>$this->Sender->name,
                'sender_image'=>$this->Sender->image,
                'sender_type'=>'provider',
                'voice'=>$this->voice,
                'file'=>$this->file,
                'type'=>$this->type,
                'lat'=>$this->lat,
                'lng'=>$this->lng,
                'is_read'=>$this->is_read,
                'created_at'=>\Carbon\Carbon::parse($this->created_at)->diffForHumans(),
            ];
        }
       }
}
