<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\User\UserResource;
use App\Models\Favorite;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(Auth::guard('user')->check()){
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'image'=>$this->image,
            'images'=>$this->images,
            'video'=>$this->video,
            'description'=>(string)$this->description,
            'type'=>$this->type,
            'active_video'=>$this->active_video,
            'active_call'=>$this->active_call,
            'active_whatsapp'=>$this->active_whatsapp,
            'phone'=>$this->phone,
            'active_chat'=>$this->active_chat,
            'create_at'=>Carbon::parse($this->created_at)->diffForHumans(),
            'show_username'=>$this->show_username,
            'user'=>UserResource::make($this->User),
            'category'=>CategoryResource::make($this->Category),
            'sub_category'=>CategoryResource::make($this->SubCategory),
            'country'=>CountriesResource::make($this->Country),
            'city'=>CountriesResource::make($this->City),
            'state'=>CountriesResource::make($this->State),
            'currency'=>CountriesResource::make($this->Currency),
                'is_favorite'=>Favorite::where('product_id',$this->id)->where('user_id',Auth::guard('user')->user()->id)->first() ? 1 : 0,
            'count_comments'=>count($this->Comments),
            'category_id'=>$this->category_id,
            'sub_category_id'=>$this->sub_category_id,
        ];
        }else{
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'price'=>$this->price,
                'image'=>$this->image,
                'images'=>$this->images,
                'video'=>$this->video,
                'description'=>$this->description,
                'type'=>$this->type,
                'active_video'=>$this->active_video,
                'active_call'=>$this->active_call,
                'active_whatsapp'=>$this->active_whatsapp,
                'phone'=>$this->phone,
                'active_chat'=>$this->active_chat,
                'create_at'=>Carbon::parse($this->created_at)->diffForHumans(),
                'show_username'=>$this->show_username,
                'user'=>UserResource::make($this->User),
                'country'=>CountriesResource::make($this->Country),
                'city'=>CountriesResource::make($this->City),
                'state'=>CountriesResource::make($this->State),
                'currency'=>CountriesResource::make($this->Currency),
                'is_favorite'=> 0,
                'count_comments'=>count($this->Comments),
                'category_id'=>$this->category_id,
                'sub_category_id'=>$this->sub_category_id,
            ];
        }
    }
}
