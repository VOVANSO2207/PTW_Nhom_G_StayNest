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



// Admin - User
// Hiển thị danh sách người dùng trong admin
Route::get('/admin/user', [UsersController::class, 'index'])->name('admin.viewuser');

// Trang thêm mới người dùng trong admin
Route::get('/admin/user/user_add', [UsersController::class, 'userAdd'])->name('user_add');

// Route cho việc lưu người dùng mới (POST)
Route::post('/admin/user/user_add', [UsersController::class, 'storeUser'])->name('user.store');

// Chức năng tìm kiếm
Route::get('/admin/user/search', [UsersController::class, 'searchUsers'])->name('admin.searchUsers');

Route::get('/admin/user/{id}', [UsersController::class, 'show'])->name('admin.user.show'); // Xem chi tiết người dùng
Route::get('/admin/user/{id}/edit', [UsersController::class, 'edit'])->name('admin.user.edit'); // Chỉnh sửa người dùng
Route::delete('/admin/user/{id}', [UsersController::class, 'destroy'])->name('admin.user.destroy'); // Xóa người dùng

// Route cập nhật người dùng
Route::put('/admin/user/{id}', [UsersController::class, 'update'])->name('admin.user.update');


// Admin - Room
Route::get('/admin/room', [RoomController::class, 'viewRoom'])->name('admin.viewroom');
Route::get('/admin/room/add', [RoomController::class, 'roomAdd'])->name('room_add');