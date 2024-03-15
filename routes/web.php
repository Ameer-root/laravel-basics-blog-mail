<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Mail\DiscountOffer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts', PostsController::class);
Route::post('posts/{post}/comments', [CommentsController::class, 'store']);

Route::get('/welcome', function () {
    echo __('messages.welcome');
});

Route::get('signup/{lang}', function ($lang) {
    App::setLocale($lang);

    return view('signup');
});

Route::post('mail/', function () {
    $email = request()->validate([
        'email' => 'required|email',
    ]);

    Mail::to($email)->send(new DiscountOffer());

    return back();
});
