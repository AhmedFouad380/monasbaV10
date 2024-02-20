<?php

use App\Http\Controllers\Admin\CurrenciesController;
use App\Http\Controllers\Admin\ProductImagesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\QuestionCommentsController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\UserVerificationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\UsersController;
use \App\Http\Controllers\Admin\CategoriesController;
use \App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\StatesController;
use App\Http\Controllers\backupController;
use \App\Http\Controllers\Admin\NotificationController;
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


Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('Login', [\App\Http\Controllers\frontController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\frontController::class, 'logout']);

Route::get('forget-password', [\App\Http\Controllers\frontController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [\App\Http\Controllers\frontController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}/{email}', [\App\Http\Controllers\frontController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [\App\Http\Controllers\frontController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['middleware' => ['admin']], function () {

    Route::get('Setting', [\App\Http\Controllers\Admin\AdminsController::class, 'Setting'])->name('profile');
    Route::post('UpdateProfile', [\App\Http\Controllers\Admin\AdminsController::class, 'UpdateProfile'])->name('UpdateProfile');

    Route::get('/', function (){
        return redirect('dashboard');
    });
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');


    Route::group(['prefix' => 'users', 'as' => 'users'], function () {

        Route::get('/', [UsersController::class, 'index'])->name('.index');
        Route::get('/datatable', [UsersController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [UsersController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('.update');
        Route::post('/store', [UsersController::class, 'store'])->name('.store');
        Route::get('/delete', [UsersController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [UsersController::class, 'changeActive'])->name('.change_active');

    });

    Route::group(['prefix' => 'admins', 'as' => 'admins'], function () {

        Route::get('/', [AdminsController::class, 'index'])->name('.index');
        Route::get('/datatable', [AdminsController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [AdminsController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [AdminsController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [AdminsController::class, 'update'])->name('.update');
        Route::post('/store', [AdminsController::class, 'store'])->name('.store');
        Route::get('/delete', [AdminsController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [AdminsController::class, 'changeActive'])->name('.change_active');

    });
    Route::group(['prefix' => 'categories', 'as' => 'categories'], function () {

        Route::get('/', [CategoriesController::class, 'index'])->name('.index');
        Route::get('/datatable', [CategoriesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [CategoriesController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('.update');
        Route::post('/store', [CategoriesController::class, 'store'])->name('.store');
        Route::get('/delete', [CategoriesController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [CategoriesController::class, 'changeActive'])->name('.change_active');

    });
    Route::group(['prefix' => 'sub_categories', 'as' => 'sub_categories'], function () {

        Route::get('/index/{id}', [SubCategoriesController::class, 'index'])->name('.index');
        Route::get('/datatable', [SubCategoriesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button/{id}', [SubCategoriesController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [SubCategoriesController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [SubCategoriesController::class, 'update'])->name('.update');
        Route::post('/store', [SubCategoriesController::class, 'store'])->name('.store');
        Route::get('/delete', [SubCategoriesController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [SubCategoriesController::class, 'changeActive'])->name('.change_active');
        Route::get('/get-products-sub-categories/{id}', [SubCategoriesController::class, 'getSubCategories'])->name('.get_sub_categories');

    });

    Route::group(['prefix' => 'countries', 'as' => 'countries'], function () {

        Route::get('/', [CountriesController::class, 'index'])->name('.index');
        Route::get('/datatable', [CountriesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [CountriesController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [CountriesController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [CountriesController::class, 'update'])->name('.update');
        Route::post('/store', [CountriesController::class, 'store'])->name('.store');
        Route::get('/delete', [CountriesController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [CountriesController::class, 'changeActive'])->name('.change_active');

    });
    Route::group(['prefix' => 'cities', 'as' => 'cities'], function () {

        Route::get('/index/{id}', [CitiesController::class, 'index'])->name('.index');
        Route::get('/datatable', [CitiesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button/{id}', [CitiesController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [CitiesController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [CitiesController::class, 'update'])->name('.update');
        Route::post('/store', [CitiesController::class, 'store'])->name('.store');
        Route::get('/delete', [CitiesController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [CitiesController::class, 'changeActive'])->name('.change_active');
        Route::get('/get-cities/{id}', [CitiesController::class, 'getCities'])->name('.get-cities');

    });
    Route::group(['prefix' => 'states', 'as' => 'states'], function () {

        Route::get('/index/{id}', [StatesController::class, 'index'])->name('.index');
        Route::get('/datatable', [StatesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button/{id}', [StatesController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [StatesController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [StatesController::class, 'update'])->name('.update');
        Route::post('/store', [StatesController::class, 'store'])->name('.store');
        Route::get('/delete', [StatesController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [StatesController::class, 'changeActive'])->name('.change_active');
        Route::get('/get-states/{id}', [StatesController::class, 'getStates'])->name('.get-states');

    });
    Route::group(['prefix' => 'currencies', 'as' => 'currencies'], function () {

        Route::get('/', [CurrenciesController::class, 'index'])->name('.index');
        Route::get('/datatable', [CurrenciesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [CurrenciesController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [CurrenciesController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [CurrenciesController::class, 'update'])->name('.update');
        Route::post('/store', [CurrenciesController::class, 'store'])->name('.store');
        Route::get('/delete', [CurrenciesController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [CurrenciesController::class, 'changeActive'])->name('.change_active');
        Route::get('/get-currencies/{id}', [CurrenciesController::class, 'getCurrencies'])->name('.get-currencies');

    });

    Route::group(['prefix' => 'contacts', 'as' => 'contacts'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('.index');
        Route::get('/datatable', [ContactController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [ContactController::class, 'table_buttons'])->name('.add-button');
        Route::get('/delete', [ContactController::class, 'destroy'])->name('.delete');
    });

    Route::group(['prefix' => 'questions', 'as' => 'questions'], function () {
        Route::get('/', [QuestionsController::class, 'index'])->name('.index');
        Route::get('/datatable', [QuestionsController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [QuestionsController::class, 'table_buttons'])->name('.add-button');
        Route::get('/delete', [QuestionsController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [QuestionsController::class, 'changeActive'])->name('.change_active');
    });
    Route::group(['prefix' => 'user-verifications', 'as' => 'user-verifications'], function () {
        Route::get('/', [UserVerificationsController::class, 'index'])->name('.index');
        Route::get('/datatable', [UserVerificationsController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [UserVerificationsController::class, 'table_buttons'])->name('.add-button');
        Route::get('/delete', [UserVerificationsController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [UserVerificationsController::class, 'changeActive'])->name('.change_active');
    });
    Route::group(['prefix' => 'question-comments', 'as' => 'question-comments'], function () {
        Route::get('/index/{id}', [QuestionCommentsController::class, 'index'])->name('.index');
        Route::get('/datatable', [QuestionCommentsController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [QuestionCommentsController::class, 'table_buttons'])->name('.add-button');
        Route::get('/delete', [QuestionCommentsController::class, 'destroy'])->name('.delete');
    });

    Route::group(['prefix' => 'products', 'as' => 'products'], function () {

        Route::get('/', [ProductsController::class, 'index'])->name('.index');
        Route::get('/datatable', [ProductsController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button', [ProductsController::class, 'table_buttons'])->name('.add-button');
        Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('.edit');
        Route::post('/update/{id}', [ProductsController::class, 'update'])->name('.update');
        Route::post('/store', [ProductsController::class, 'store'])->name('.store');
        Route::get('/delete', [ProductsController::class, 'destroy'])->name('.delete');
        Route::post('/change_active', [ProductsController::class, 'changeActive'])->name('.change_active');

    });

    Route::group(['prefix' => 'product-images', 'as' => 'product-images'], function () {

        Route::get('/index/{id}', [ProductImagesController::class, 'index'])->name('.index');
        Route::get('/datatable', [ProductImagesController::class, 'datatable'])->name('.datatable');
        Route::get('/add-button/{id}', [ProductImagesController::class, 'table_buttons'])->name('.add-button');
        Route::post('/store', [ProductImagesController::class, 'store'])->name('.store');
        Route::get('/delete', [ProductImagesController::class, 'destroy'])->name('.delete');

    });
    Route::group(['prefix' => 'Setting', 'as' => 'Setting'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('.index');
        Route::post('/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('.update');

    });


});


Route::group(['prefix' => 'backup', 'as' => 'backup'], function () {

    Route::get('/', [backupController::class, 'index'])->name('.index');
    Route::get('/datatable', [backupController::class, 'datatable'])->name('.datatable');
    Route::get('/add-button/{id}', [backupController::class, 'table_buttons'])->name('.add-button');
    Route::post('/store', [backupController::class, 'store'])->name('.store');
    Route::get('/delete', [backupController::class, 'destroy'])->name('.delete');
    Route::get('/import', [backupController::class, 'import'])->name('.import');

});


Route::group(['prefix' => 'Notification', 'as' => 'Notification'], function () {

    Route::get('/', [NotificationController::class, 'index'])->name('.index');
    Route::get('/datatable', [NotificationController::class, 'datatable'])->name('.datatable');
    Route::get('/add-button', [NotificationController::class, 'table_buttons'])->name('.add-button');
    Route::get('/edit/{id}', [NotificationController::class, 'edit'])->name('.edit');
    Route::post('/update/{id}', [NotificationController::class, 'update'])->name('.update');
    Route::post('/store', [NotificationController::class, 'store'])->name('.store');
    Route::get('/delete', [NotificationController::class, 'destroy'])->name('.delete');
    Route::post('/change_active', [NotificationController::class, 'changeActive'])->name('.change_active');

});
