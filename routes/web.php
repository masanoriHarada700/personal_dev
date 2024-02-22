<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', \App\Http\Controllers\ProfilePage\LoginController::class)
->name('user.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', \App\Http\Controllers\ProfilePage\TopPageController::class)
    ->name('profilePage.profile');
});

Route::get('/user_register', \App\Http\Controllers\ProfilePage\IndexController::class)
->name('user.register');

// Route::get('/user_login', \App\Http\Controllers\ProfilePage\LoginController::class)
// ->name('user.login');


Route::post('/user/create', [RegisteredUserController::class, 'store'])
->name('user.create');

require __DIR__.'/auth.php';
