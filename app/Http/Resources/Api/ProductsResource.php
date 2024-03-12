<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\User\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'price'=>$this->price,
            'image'=>$this->image,
            'images'=>$this->images,
            'video'=>$this->video,
            'description'=>(string)$this->description,
            'type'=>$this->type,
            'active_video'=>$this->active_video,
            'user'=>UserResource::make($this->User),
            'country'=>CountriesResource::make($this->Country),
            'city'=>CountriesResource::make($this->City),
            'state'=>CountriesResource::make($this->State),
            'currency'=>CountriesResource::make($this->Currency),
            'date'=>Carbon::parse($this->created_at)->diffForHumans(),
            'count_comments'=>count($this->Comments),
            'show_username'=>$this->show_username,
            'category_id'=>$this->category_id,
            'sub_category_id'=>$this->sub_category_id,
        ];
    }
}
