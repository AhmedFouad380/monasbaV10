<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function category($id){
        $category = SubCategory::findOrFail($id);
        $data = Product::where('country_id',session()->get('country'))->OrderBy('id','desc')->where('sub_category_id',$id)->paginate(10);
        return view('website.categories',compact('data','category'));
    }
    public function Blogs(){
        $blogs = Blog::where('country_id',session()->get('country'))->OrderBy('id','desc')->paginate(10);
        return view('website.blogs',compact('blogs'));
    }
    public function Blog($id){
        $data = Blog::findOrFail($id);
        return view('website.blog',compact('data'));
    }
    public function product($id){
        $data = Product::findOrFail($id);
        $related = Product::where('country_id',session()->get('country'))->where('sub_category_id',$data->sub_category_id)->InRandomOrder()->limit(6)->get();
        return view('website.product',compact('data','related'));

    }
    public function ajaxProduct($id){
        $data = Product::findOrFail($id);
        return view('website.product_view_ajax',compact('data'));

    }

    public function addComment(Request $request){

        $data = new Comment();
        $data->comment=$request->comment;
        $data->user_id=Auth::guard('web')->id();
        $data->product_id=$request->product_id;
        $data->save();

        return back()->with('success',__('lang.data_added_s'));
    }

    public function Contact(){

        return view('website.contact');
    }
    public function storeContact(Request $request){

        $data = new Contact();
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->message=$request->message;
        $data->save();

        return back()->with('success',__('lang.data_added_s'));
    }
    public function storeSubscribe(Request $request){
     $this->validate(request(), [
            'email' => 'required|email',

        ]);
        $email =Subscribe::where('email',$request->email)->first();
        if(isset($email)){
            return back()->with('error',__('lang.email_already_exists'));

        }else{
            $data = new Subscribe();
            $data->email=$request->email;
            $data->save();

            return back()->with('success',__('lang.data_added_s'));

        }
    }

    public function changeCountry(Request $request){
        session()->put('country',$request->id);
        return 1;
    }
}
