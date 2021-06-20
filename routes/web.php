<?php

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

Route::get('/p/create', 'App\Http\Controllers\PostsController@create');
// Route::get('/p', [App\Http\Controllers\PostsController::class, 'create'])->name('profile.create');

Route::post('/p', [PostsController::class, 'store'])->name('profile.store');
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');

// Route::get('/profile/{user}', 'App\Http\Controllers\ProfileController@index' ) ;
Route::get('/profile/{user}/edit' , [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}' , [ProfileController::class, 'update'])->name('profile.update');
