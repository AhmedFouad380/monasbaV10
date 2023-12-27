<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $foo;

    public function foo($value){
        $this->foo = $value;
        return $this;
    }
    public function toArray($request)
    {
        if($this->type == 'followers'){
            return  [
                'id'=>$this->id,
                'user_id'=>$this->user_id,
                'user_name'=>$this->User->name,
                'user_city'=>$this->User->City,
                'user_image'=>$this->User->image,
                'is_follow'=>$this->User->is_follow($this->User->id) > 0 ? 1 : 0,
                'is_verified'=>$this->User->verified ? 1 : 0,
                'date'=>Carbon::parse($this->created_at)->format('Y-m-d')
            ];
        }else{
            return  [
                'id'=>$this->id,
                'user_id'=>$this->profile_id,
                'user_city'=>$this->Profile->City,
                'user_name'=>$this->Profile->name,
                'user_image'=>$this->Profile->image,
                'is_follow'=>$this->Profile->is_follow($this->Profile->id) > 0 ? 1 : 0,
                'is_verified'=>$this->Profile->verified ? 1 : 0,
                'date'=>Carbon::parse($this->created_at)->format('Y-m-d')
            ];
        }
    }
}
