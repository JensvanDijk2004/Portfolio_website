<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\homeController;
use App\http\Controllers\PostController;
use App\http\Controllers\CommentController;

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

Route::get('/', [homeController::class, 'index']);

Route::get('/home', [homeController::class, 'index'])->name('home');

Route::get('/Auth/login', [AuthController::class, "inlog"])->name('login');
Route::post('/Auth/login', [AuthController::class, 'inlogPost']);

Route::get('/Auth/signUp', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/Auth/signUp', [AuthController::class, 'signUpPost']);

Route::get("/Auth/logout", [AuthController::class, 'logout'])->name('logout');


Route::prefix("post")->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('showPost');

    // Route::post('/insertFile}', [PostController::class, 'insert'])->name('insertFile');

    Route::middleware(['auth'])->group(function () {
        Route::get('/like/{post}', [ PostController::class, 'like'])->name('likePost');
        Route::get('/dislike/{post}', [ PostController::class, 'dislike'])->name('dislikePost');
    });

    Route::middleware(['auth', 'App\Http\Middleware\isAdmin'])->group(function() {
        Route::get("/create", [PostController::class, 'create'])->name('postCreate');
        Route::post("/create", [PostController::class, 'store']);

        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('postEdit');
        Route::put('/edit/{post}', [PostController::class, 'update']);

        Route::get("/delete/{post}", [ PostController::class, 'delete'])->name('postDelete');
    });
});

Route::middleware(['auth'])->prefix('/Comment')->group(function (){
    Route::post('/create/{post}', [CommentController::class, 'store'])->name('commentCreate');
});
