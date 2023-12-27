<?php

namespace App\Http\Resources\Api\User;

use App\Http\Resources\Api\CountriesResource;
use App\Http\Resources\Api\RateResource;
use App\Models\Follower;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'id' => $this->id,
            'image' => $this->image,
            'cover' => $this->cover,
            'name' => $this->name,
            'username' => $this->username,
            'about_ar' => $this->about_ar,
            'about_en' => $this->about_en,
            'email' => $this->email,
            'country_code' => $this->country_code,
            'phone' => $this->phone,
            'country'=> $this->Country ? CountriesResource::make($this->Country) : null,
            'city' => $this->City ? $this->City : null,
            'state' => $this->State ? $this->State : null,
            'ads-count'=> Product::where('user_id',$this->id)->count(),
            'rate-count'=> $this->TotalRate($this->id),
            'followers-count'=> count($this->followers),
            'following-count'=> count($this->following),
            'is_verified'=>$this->verified ? 1 : 0,
            'is_follow'=>$this->is_follow($this->id) > 0 ? 1 : 0,
            'is_Notify'=>$this->is_Notify($this->id) > 0 ? 1 : 0,
        ];
    }
}
