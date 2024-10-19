<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/search_result', function () {
    return view('search_result');
});


// Admin - Home
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Admin - Post
Route::get('/admin/post', [PostsController::class, 'viewPost'])->name('admin.viewpost');
Route::get('/admin/post/add', [PostsController::class, 'postAdd'])->name('post_add');
Route::post('admin/post/store', [PostsController::class, 'store'])->name('admin.post.store');
Route::get('/posts/{post_id}/detail', action: [PostsController::class, 'getPostDetail'])->name('post.detail');



// Admin - User
Route::get('/admin/user', [UsersController::class, 'viewUser'])->name('admin.viewuser');
Route::get('/admin/user/add', [UsersController::class, 'userAdd'])->name('user_add');


// Admin - Room
Route::get('/admin/room', [RoomController::class, 'viewRoom'])->name('admin.viewroom');
Route::get('/admin/room/add', [RoomController::class, 'roomAdd'])->name('room_add');