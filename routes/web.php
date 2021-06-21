<?php

use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

// Auth::routes(['register' => false]);
Auth::routes();

// Posts Controller
Route::get('/', [PostsController::class, 'index'])->name('posts.show');
Route::get('/p/create', [PostsController::class, 'create']);
Route::post('/p', [PostsController::class, 'store'])->name('profile.store');
Route::get('/p/{post}', [PostsController::class, 'show']);

// Profile Controller
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit' , [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}' , [ProfileController::class, 'update'])->name('profile.update');

// Follow Button Controller
Route::post('/follow/{user}', [FollowsController::class, 'store']);
