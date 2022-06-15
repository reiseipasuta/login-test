<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/index', function () {
        return view('index');
    });
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [MainController::class, 'dashboard'])
       ->name('dashboard');

    Route::get('/top', [MainController::class, 'top'])
        ->name('top');

    Route::post('/create', [MainController::class, 'create'])
        ->name('create');

    Route::get('/contents/followlist', [MainController::class, 'followlist'])
        ->name('followlist');

    Route::get('/contents/followerlist', [MainController::class, 'followerlist'])
        ->name('followerlist');

    Route::get('/contents/favoritelist', [MainController::class, 'favoriteList'])
        ->name('favoritelist');

    Route::get('/contents/{content}', [MainController::class, 'contents'])
        ->name('contents');

    Route::post('/contents/{content}/comments', [CommentController::class, 'create'])
        ->name('comments');

    Route::get('/contents/{content}/change', [MainController::class, 'change'])
        ->name('change');

    Route::patch('/contents/{content}/edit', [MainController::class, 'edit'])
        ->name('edit');

    Route::post('/contents/{content}/delete', [MainController::class, 'delete'])
        ->name('delete');

    Route::post('/contents/{content}/good', [MainController::class, 'good'])
        ->name('good');

    Route::post('/contents/{content}/follow', [MainController::class, 'follow'])
        ->name('follow');

    Route::post('/contents/{content}/unfollow', [MainController::class, 'unfollow'])
        ->name('unfollow');

    Route::post('/contents/{content}/favorite', [MainController::class, 'favorite'])
        ->name('favorite');

    Route::post('/contents/{content}/unfavorite', [MainController::class, 'unfavorite'])
        ->name('unfavorite');

    Route::get('/contents/{user}/page', [MainController::class, 'userPage'])
        ->name('userPage');



});

require __DIR__.'/auth.php';
