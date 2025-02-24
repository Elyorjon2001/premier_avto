<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Admin_middleware;
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


use App\Http\Controllers\UserController;
 
Route::get('/', [UserController::class, 'home'])->name('home');

Route::get('about', [UserController::class, 'about'])->name('about');

Route::get('booking', [UserController::class, 'booking'])->name('booking');

Route::get('car', [UserController::class, 'car'])->name('car');

Route::get('contact', [UserController::class, 'contact'])->name('contact');

Route::get('detail', [UserController::class, 'detail'])->name('detail');

Route::get('service', [UserController::class, 'service'])->name('service');

Route::get('team', [UserController::class, 'team'])->name('team');

Route::get('testmonial', [UserController::class, 'testmonial'])->name('testmonial');

Route::get('/admin', function () {
    return view(('admin') );
});





use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('updatePassword', [AuthController::class, 'updatePassword'])->name('updatePassword');
Route::get('update', [AuthController::class, 'update'])->name('update');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');



Route::resources([
    'posts'=> PostController::class,
    'users'=> UserController::class

]);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');



// Adminlar uchun faqat autentifikatsiyalangan yo'nalishlar
// Route file
Route::middleware([Admin_middleware::class])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update'); // Qo'shildi
    Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});






