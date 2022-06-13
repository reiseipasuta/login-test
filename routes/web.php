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

});

require __DIR__.'/auth.php';
