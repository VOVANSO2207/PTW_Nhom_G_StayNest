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


// Admin - Room
// Route::get('/admin/room', [RoomController::class, 'index'])->name('admin.viewroom');
// Route::get('/admin/room/add', [RoomController::class, 'roomAdd'])->name('room_add');



Route::prefix('admin')->group(function () {
    // Route cho danh sách phòng
    Route::get('/room', [RoomController::class, 'index'])->name('admin.viewroom');

    // Route cho thêm phòng
    // Route::get('/rooms/add', [RoomController::class, 'create'])->name('room_add');

    // Route cho xem chi tiết phòng (nếu cần)
    // Route::get('/room/{id}', [RoomController::class, 'show'])->name('room_show');
    Route::get('/room/add', [RoomController::class, 'show'])->name('room_add');
    Route::post('/room/store', [RoomController::class, 'store'])->name('room_store');
    // Route::delete('/room/{room_id}', [RoomController::class, 'destroy'])->name('room_destroy');
    Route::delete('room/{room_id}', [RoomController::class, 'destroy'])->name('room.destroy');

    // Admin - Post
    Route::get('/post', [PostsController::class, 'viewPost'])->name('admin.viewpost');
    Route::get('/post/add', [PostsController::class, 'postAdd'])->name('post_add');
    // Route::get('/admin/room/{room_id}', [RoomController::class, 'getRoomById'])->name('room.getRoomById');

    // Admin - User
    Route::get('/user', [UsersController::class, 'viewUser'])->name('admin.viewuser');
    Route::get('/user/add', [UsersController::class, 'userAdd'])->name('user_add');
});
