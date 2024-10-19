<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Hiển thị mặc định trang chủ
// Route::get('/', function () {
//     return view('pages.home');
// });

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



// Admin - User
Route::get('/admin/user', [UsersController::class, 'viewUser'])->name('admin.viewuser');
Route::get('/admin/user/add', [UsersController::class, 'userAdd'])->name('user_add');


// Admin - Room
Route::get('/admin/room', [RoomController::class, 'viewRoom'])->name('admin.viewroom');
Route::get('/admin/room/add', [RoomController::class, 'roomAdd'])->name('room_add');

// User - home
Route::get('/pages/home', [HomeController::class, 'index']);

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');