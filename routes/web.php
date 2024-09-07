<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts=[];
    if(auth()->check()){
        $posts = auth()->user()->blogPosts()->latest()->get();
    }
    // $posts= Post::where('user_id',auth()->id())->get();
    return view('home',['blogposts'=>$posts]);
});

Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class,'login']);

//Routes for postControllers

Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'editPost']);
Route::put('/edit-post/{post}',[PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}',[PostController::class,'deletePost']);
Route::delete('/test-delete/{id}', function ($id) {
    return "Deleting post with ID: " . $id;
});
Route::get('/delete-test', function () {
    return view('delete-test');
});