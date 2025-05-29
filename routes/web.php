<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {

    return view('home',['posts'=> Post::where('user_id',auth()->id())->get()]);
});

//user urls
Route::post('/Register',[UserController::class,"register"]);
Route::post('/logout',[UserController::class,"logout"]);
Route::post('/login',[UserController::class,"login"]);


//blog post urls

Route::post("/create-post",[PostController::class,"createpost"]);
Route::get("/edit-post/{post}",[PostController::class,"showeditpost"]);
Route::put("/edit-post/{post}",[PostController::class,"updatepost"]);
Route::delete("/delete-post/{post}",[PostController::class,"deletepost"]);

