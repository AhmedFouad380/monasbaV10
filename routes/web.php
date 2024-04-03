<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('lang/{lang}', function ($lang) {


    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }

    return back();
});

Route::get('test-env',function (){
    return env('PUSHER_APP_KEY');
});
Route::get('category/{id}', [WebsiteController::class, 'category']);
Route::get('Blogs', [WebsiteController::class, 'Blogs']);
Route::get('Blog/{id}', [WebsiteController::class, 'Blog']);
Route::get('product/{id}', [WebsiteController::class, 'product']);
Route::get('ajax/product/{id}', [WebsiteController::class, 'ajaxProduct']);
Route::post('add-comment', [WebsiteController::class, 'addComment']);
Route::get('Contact', [WebsiteController::class, 'Contact']);
Route::post('store_contact', [WebsiteController::class, 'storeContact']);
Route::get('change_country', [WebsiteController::class, 'changeCountry']);
Route::get('store-subscribe', [WebsiteController::class, 'storeSubscribe']);
Route::get('send_mail_to_users', [WebsiteController::class, 'send_mail_to_users']);
Route::get('user/{id}', [WebsiteController::class, 'profile']);

Route::get('/', function (){
    return view('website.index');
});



