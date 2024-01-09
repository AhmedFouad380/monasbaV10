<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use \App\Http\Controllers\Api\CommentsComtroller;
use \App\Http\Controllers\Api\RateController;
use \App\Http\Controllers\Api\FollowerController;
use \App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\QuestionCommentController;
use \App\Http\Controllers\Api\ChatController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/force_update', [HomeController::class, 'forceUpdate']);

Route::prefix('client')->group(function () {
    Route::get('/current_location', [HomeController::class, 'currentLocation'])->name('current_location');

    Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
    Route::get('/sub-categories', [HomeController::class, 'subCategories'])->name('subCategories');
    Route::get('/countries', [HomeController::class, 'Countries'])->name('categories');
    Route::get('/cities', [HomeController::class, 'Cities'])->name('cities');
    Route::get('/states', [HomeController::class, 'States'])->name('states');
    Route::get('/currencies', [HomeController::class, 'Currencies'])->name('Currencies');

    Route::get('/products', [HomeController::class, 'products'])->name('products');
    Route::get('/product-details', [HomeController::class, 'productDetails'])->name('productsDetails');

    Route::middleware('guest')->group(function () {

        Route::get('/settings', [HomeController::class, 'settings']);

        Route::prefix('auth')->group(function () {
            Route::post('/login', [AuthController::class, 'login']);
            Route::post('/sign-up', [AuthController::class, 'register']);
            Route::post('/sign-up/verify-phone', [AuthController::class, 'verifyPhone']);
            Route::post('/sign-up/resend-verify-phone', [AuthController::class, 'resendVerifyPhone']);
            Route::post('/register', [AuthController::class, 'register']);
            Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm']);
            Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm']);

        });
    });

    Route::get('search-profiles',[AuthController::class,'searchProfile'])->name('searchProfile');
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions');

    Route::group(['middleware' => ['user']], function () {
        Route::get('/notification-count', [HomeController::class, 'notificationCount'])->name('cities');

        Route::prefix('auth')->group(function () {
            Route::post('/change-password', [AuthController::class, 'changePassword'])->name('client.change.password');
            Route::get('/logout', [AuthController::class, 'logout'])->name('client.logout');
            Route::get('/profile', [AuthController::class, 'profile']);
            Route::post('/updateStatus', [AuthController::class, 'updateStatus']);
            Route::post('/profile/update', [AuthController::class, 'profileUpdate']);
            Route::post('/delete-account', [AuthController::class, 'delete'])->name('delete');
            Route::post('/change-country', [AuthController::class, 'changeCountry'])->name('changeCountry');
            Route::post('/change-phone', [AuthController::class, 'changePhone'])->name('changePhone');
            Route::post('/confirm-change-phone', [AuthController::class, 'ConfirmChangePhone'])->name('ConfirmChangePhone');
            Route::post('/remove-image', [AuthController::class, 'removeImage'])->name('removeImage');

        });
        Route::get('/UserProfile', [AuthController::class, 'UserProfile'])->name('UserProfile');

        Route::get('/home', [HomeController::class, 'index']);

        Route::get('/user-products', [HomeController::class, 'UserProducts'])->name('UserProducts');
        Route::post('store-product',[HomeController::class,'storeProduct'])->name('storeProduct');
        Route::post('delete-product',[HomeController::class,'deleteProduct'])->name('deleteProduct');
        Route::post('update-product',[HomeController::class,'updateProduct'])->name('updateProduct');
        Route::post('delete-product-image',[HomeController::class,'deleteProductImages'])->name('deleteProductImages');

        Route::get('/favorites', [HomeController::class, 'favorites'])->name('favorites');
        Route::post('store-favorite',[HomeController::class,'storeFavorite'])->name('storeFavorite');

        // Products Comments
        Route::get('/comments', [CommentsComtroller::class, 'index'])->name('comments');
        Route::get('/comments-details', [CommentsComtroller::class, 'commentDetails'])->name('commentDetails');
        Route::post('/store-comment', [CommentsComtroller::class, 'storeComment'])->name('storeComment');
        Route::post('/delete-comment', [CommentsComtroller::class, 'deleteComment'])->name('deleteComment');

        Route::get('/rates', [RateController::class, 'index'])->name('comments');
        Route::post('/store-rate', [RateController::class, 'storeRate'])->name('storeRate');
        Route::post('/delete-rate', [RateController::class, 'deleteRate'])->name('deleteRate');

        Route::get('/followers', [FollowerController::class, 'index'])->name('followers');
        Route::post('/store-follower', [FollowerController::class, 'storeFollower'])->name('storeFollower');
        Route::post('/delete-follower', [FollowerController::class, 'deleteFollower'])->name('deleteFollower');

        Route::post('/store-notify', [FollowerController::class, 'storeNotify'])->name('storeNotify');
        Route::post('/delete-notify', [FollowerController::class, 'deleteNotify'])->name('deleteNotify');

        Route::post('/store-verification', [\App\Http\Controllers\Api\VerificationController::class, 'store'])->name('store');

        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::post('/notification/delete', [NotificationController::class, 'DeleteNotification'])->name('notification.delete');
        Route::post('/notification/deleteAll', [NotificationController::class, 'DeleteAllNotification'])->name('notification.DeleteAll');

        Route::get('/my-questions', [QuestionController::class, 'myQuestions'])->name('comments');
        Route::post('/store-question', [QuestionController::class, 'storeQuestion'])->name('storeQuestion');
        Route::post('/delete-question', [QuestionController::class, 'deleteQuestion'])->name('deleteQuestion');

        Route::get('/question-comments', [QuestionCommentController::class, 'index'])->name('comments');
        Route::post('/store-question-comment', [QuestionCommentController::class, 'storeQuestionComment'])->name('storeQuestionComment');
        Route::post('/delete-question-comment', [QuestionCommentController::class, 'deleteQuestionComment'])->name('deleteQuestionComment');


        Route::post('/report-comment', [\App\Http\Controllers\Api\ReportController::class, 'store'])->name('reportComment');
        Route::post('/report', [\App\Http\Controllers\Api\ReportController::class, 'chatReport'])->name('chatReport');

        Route::get('/setting', [HomeController::class, 'setting'])->name('setting');

        Route::prefix('chat')->group(function () {
            Route::get('/', [ChatController::class, 'index']);
            Route::get('/details', [ChatController::class, 'getChat']);
            Route::get('/details-no-pagination', [ChatController::class, 'getChat2']);
            Route::post('/send', [ChatController::class, 'sendMessage']);
            Route::post('/delete-message', [ChatController::class, 'deleteMessage']);
            Route::post('/delete', [ChatController::class, 'delete']);
            Route::post('/block', [ChatController::class, 'blackChat'])->name('blackChat');

        });


        Route::post('store-contact',[HomeController::class,'storeContact'])->name('updateProduct');

    });
});

Route::get('/changeProductsStatus', [HomeController::class, 'changeProductsStatus'])->name('setting');
