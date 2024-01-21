<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForceUpdateRequest;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\CitiesResource;
use App\Http\Resources\Api\CountriesResource;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\ProductsResource;
use App\Http\Resources\Api\SettingResource;
use App\Models\Category;
use App\Models\Chat;
use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Favorite;
use App\Models\Notification;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Setting;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function categories(Request $request)
    {

        $result = Category::OrderBy('id', 'asc')->where('status', 'active');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        $data = CategoryResource::collection($result->get())->response()->getData(true);;
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function subCategories(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $result = SubCategory::OrderBy('id', 'asc')->where('category_id',$request->category_id)->where('status', 'active');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        $data = CategoryResource::collection($result->get())->response()->getData(true);;
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function Currencies(Request $request)
    {

        $result = Currency::OrderBy('id', 'asc')->where('status', 'active');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        $data = CitiesResource::collection($result->get());
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }
    public function Countries(Request $request)
    {

        $result = Country::OrderBy('id', 'asc')->where('status', 'active');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        $data = CountriesResource::collection($result->get());
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }



    public function Cities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|exists:countries,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $result = City::OrderBy('id', 'asc')->where('country_id',$request->country_id)->where('status', 'active');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        $data = CitiesResource::collection($result->get());
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }
    public function States(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|exists:cities,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }

        $result = State::OrderBy('id', 'asc')->where('city_id',$request->city_id)->where('status', 'active');

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        $data = CitiesResource::collection($result->get());
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }
    public function products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'nullable',
            'country_id' => 'nullable|exists:countries,id',
            'sub_category_id' => 'nullable',
            'city_id' => 'nullable|exists:cities,id',
            'state_id' => 'nullable|exists:states,id',
            'sort' => 'nullable|in:near,new,high_price,low_price',
            'type' => 'nullable|in:sale,rent,0',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        if(isset($request->sort) ){
            $result = Product::where('status', 'active');
            if($request->sort == 'near'){
                $result->OrderBy('id','desc');
            }
            elseif($request->sort == 'high_price'){
                $result->OrderBy('price','desc');
            }
            elseif($request->sort == 'low_price'){
                $result->OrderBy('price','asc');
            }
            elseif($request->sort == 'new'){
                $result->OrderBy('id','desc');
            }
        }else{
            $result = Product::OrderBy('id', 'desc')->where('status', 'active');
        }

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        if(isset($request->category_id) &&  $request->category_id != 0 ){
            $result->where('category_id',$request->category_id);
        }
        if(isset($request->type) &&  $request->type != 0 ){
            $result->where('type',$request->type);
        }
        if(isset($request->sub_category_id) &&  $request->sub_category_id != 0 ){
            $result->where('sub_category_id',$request->sub_category_id);
        }
        if(isset($request->country_id)){
            $result->where('country_id',$request->country_id);
        }
        if(isset($request->city_id)){
            $result->where('city_id',$request->city_id);
        }
        if(isset($request->state_id)){
            $result->where('state_id',$request->state_id);
        }
        if(isset($request->user_id)){
            $result->where('user_id',$request->user_id);
        }
        $data = ProductsResource::collection($result->paginate(20))->response()->getData(true);;
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function productDetails(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $result = Product::findOrFail($request->product_id);
        $result->views = 1 + $result->views;
        $result->save();
        $data = ProductResource::make($result);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function storeProduct(ProductRequest $request){
        $data = $request->validated();

        $images = $data['images'];
        unset($data['images']);
        $data['user_id']=Auth::guard('user')->user()->id;
        $result = Product::create($data);
        if(isset($images)){
        foreach($images as $key => $image){
            ProductImages::create([
                'product_id'=>$result->id,
                'image'=>$image,
            ]);
        }
        }

        // Notifcation For follwers
        $tokens = [];
        if(isset(Auth::guard('user')->user()->Notifyfollowers)){
        foreach (Auth::guard('user')->user()->Notifyfollowers as $followers){
            $notifcation = Notification::create([
                'name_ar'=>'تم اضافة منتج جديد من قبل '. Auth::guard('user')->user()->name,
                'name_en'=>'A new product has already been added by '. Auth::guard('user')->user()->name,
                'product_id'=>$result->id,
                'user_id'=>$followers->id,
            ]);
            $tokens[]=$followers->fcm_token;
        }
        if(isset($notifcation)){
            send($tokens,'Monsaba',$notifcation['title'],$result->id );
        }
        }
        // end notifcation
        $data = ProductResource::make($result);
        return msgdata(true, trans('lang.added_s'), $data, success());

    }
    public function storeProductOldapp(ProductRequest $request){
        $data = $request->validated();

        $images = $data['images'];
        unset($data['images']);
        $data['user_id']=Auth::guard('user')->user()->id;
        $result = Product::create($data);
        if(isset($images)){
            foreach($images as $key => $image){
                ProductImages::create([
                    'product_id'=>$result->id,
                    'image'=>$image,
                ]);
            }
        }

        // Notifcation For follwers
        $tokens = [];
        if(isset(Auth::guard('user')->user()->Notifyfollowers)){
            foreach (Auth::guard('user')->user()->Notifyfollowers as $followers){
                $notifcation = Notification::create([
                    'name_ar'=>'تم اضافة منتج جديد من قبل '. Auth::guard('user')->user()->name,
                    'name_en'=>'A new product has already been added by '. Auth::guard('user')->user()->name,
                    'product_id'=>$result->id,
                    'user_id'=>$followers->id,
                ]);
                $tokens[]=$followers->fcm_token;
            }
            if(isset($notifcation)){
                send($tokens,'Monsaba',$notifcation['title'],$result->id );
            }
        }
        // end notifcation
        $data = ProductResource::make($result);
        return msgdata(true, trans('lang.added_s'), $data, success());

    }

    public function updateProduct(ProductRequest $request){

        $data = $request->validated();


        if(isset($data['images'])){
            $images = $data['images'];
            unset($data['images']);
        }
        $data['user_id']=Auth::guard('user')->user()->id;
        if($request->image){
            $video = upload($request->image, 'products');
            $data['image'] =  $video;
        }else{
            unset($data['image']);
        }
        $result = Product::where('id',$data['id'])->update($data);

        if(isset($images)){
//            ProductImages::where('product_id',$data['id'])->delete();
            foreach($images as $key => $image){
                ProductImages::create([
                    'product_id'=>$data['id'],
                    'image'=>$image,
                ]);
            }
        }

        // Notifcation For follwers
//        $tokens = [];
//        if(isset(Auth::guard('user')->user()->follwers)){
//            foreach (Auth::guard('user')->user()->follwers as $followers){
//                $notifcation = Notification::create([
//                    'name_ar'=>'تم تعديل منتج جديد من قبل '. Auth::guard('user')->user()->name,
//                    'name_en'=>'A product has been Edit by '. Auth::guard('user')->user()->name,
//                    'product_id'=>$result->id,
//                    'user_id'=>$followers->id,
//                ]);
//                $tokens[]=$followers->fcm_token;
//            }
//            send($tokens,'Monsaba',$notifcation['title'],$result->id );
//        }
        // end notifcation

        $data = ProductResource::make( Product::find($data['id']));
        return msgdata(true, trans('lang.data_updated_s'), $data, success());

    }
    public function deleteProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        Product::where('id',$request->product_id)->where('user_id',Auth::guard('user')->user()->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }
    public function deleteProductImages(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:product_images,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        ProductImages::where('id',$request->id)->delete();

        return msgdata(true, trans('lang.deleted_s'), (object)[], success());

    }

    public function favorites(Request $request){

        $favorites = Favorite::where('user_id',Auth::guard('user')->user()->id)->pluck('product_id');
        $result = Product::where('status', 'active')->whereIn('id',$favorites);

        $data = ProductsResource::collection($result->paginate(10))->response()->getData(true);
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }
    public function storeFavorite(Request $request){

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        if(Favorite::where('user_id',Auth::guard('user')->user()->id)->where('product_id',$request->product_id)->count() > 0){
            Favorite::where('user_id',Auth::guard('user')->user()->id)->where('product_id',$request->product_id)->delete();
            return msgdata(true, trans('lang.deleted_s'), (object)[], success());
        }else{
            Favorite::create([
                'user_id'=>Auth::guard('user')->user()->id,
                'product_id'=>$request->product_id
            ]);
            return msgdata(true, trans('lang.added_s'), (object)[], success());

        }

    }

    public function storeContact(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $data = new Contact();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->save();

        return msgdata(true, trans('lang.added_s'), (object)[], success());

    }

    public function UserProducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'nullable|exists:categories,id',
            'country_id' => 'nullable|exists:countries,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'city_id' => 'nullable|exists:cities,id',
            'state_id' => 'nullable|exists:states,id',
            'sort' => 'nullable|in:near,new,high_price,low_price',
            'type' => 'nullable|in:sale,rent',

        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
            $result = Product::OrderBy('id', 'desc')->where('status', 'active')->where('user_id',Auth::guard('user')->user()->id);

        if (isset($request->search)) {
            $result->where(function ($q) use ($request) {
                $q->where('name_ar', 'like', '%' . $request->search . '%')->Orwhere('name_en', 'like', '%' . $request->search . '%');
            });
        }
        if(isset($request->category_id)){
            $result->where('category_id',$request->category_id);
        }
        if(isset($request->type)){
            $result->where('type',$request->type);
        }
        if(isset($request->sub_category_id)){
            $result->where('sub_category_id',$request->sub_category_id);
        }
        if(isset($request->country_id)){
            $result->where('country_id',$request->country_id);
        }
        if(isset($request->city_id)){
            $result->where('city_id',$request->city_id);
        }
        if(isset($request->state_id)){
            $result->where('state_id',$request->state_id);
        }

        $data = ProductsResource::collection($result->paginate(10))->response()->getData(true);;
        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function setting(){
        $data = SettingResource::make(Setting::find(1));
        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }

    public function currentLocation(Request $request){
        $ip = $request->ip();
        if ($position = Location::get($ip)) {
            $data = Country::where('name_en','like','%'.$position->countryName.'%')->first();
            if(isset($data)){
                $country=  CountriesResource::make($data);
                return msgdata(true, trans('lang.data_display_success'), $country, success());
            }else{
                $country=  CountriesResource::make(Country::first());
                return msgdata(true, trans('lang.data_display_success'), $country, success());
            }
        }else{
            $country=  CountriesResource::make(Country::first());
            return msgdata(true, trans('lang.data_display_success'), $country, success());

        }

    }

    public function notificationCount(Request $request){
        $data['Notifications'] = Notification::where('user_id',Auth::guard('user')->user()->id)->where('is_read',0)->count();
        $data['chat'] =  Chat::where(function ($q){
            $q->where('user_id',Auth::guard('user')->user()->id)->Orwhere('provider_id',Auth::guard('user')->user()->id);
        })->whereHas('unreadMessage',function ($q){
            $q->where('sender_id','!=',Auth::guard('user')->user()->id);
        })->count();
        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function forceUpdate(ForceUpdateRequest $request){

        if($request->type == 'ios'){
            if(Setting::find(1)->ios_version == $request->version){
                $data['isForceUpdate'] =false;
            }else{
                $data['isForceUpdate'] =true;
            }
        }else{
            if(Setting::find(1)->android_version == $request->version){
                $data['isForceUpdate'] =false;
            }else{
                $data['isForceUpdate'] =true;
            }
        }

        return msgdata(true, trans('lang.data_display_success'), $data, success());
    }

    public function changeProductsStatus(){
        Product::OrderBy('id','desc')->update(['status'=>'active']);
        echo 'success';
    }
}
