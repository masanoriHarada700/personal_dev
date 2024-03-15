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

Route::get('/', function () {
    return view('user.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile_edit', \App\Http\Controllers\ProfilePage\EditPageController::class)
    ->name('profile.edit');

    Route::post('/profile_edit', \App\Http\Controllers\ProfilePage\EditPageController::class);

    Route::get('/create_profile', \App\Http\Controllers\ProfilePage\CreateProfileController::class)
    ->name('create.profile');

    Route::post('/create_profile', \App\Http\Controllers\ProfilePage\CreateProfileController::class);

    Route::get('/profile', \App\Http\Controllers\ProfilePage\TopPageController::class)
    ->name('profilePage.profile');

    Route::get('/record_study', \App\Http\Controllers\Learn\IndexController::class)
    ->name('show_study');

    Route::post('/record_study', \App\Http\Controllers\Learn\IndexController::class)
    ->name('record_study');

    Route::get('/input_item', \App\Http\Controllers\Learn\InputItemController::class)
    ->name('input.item');

    Route::post('/input_item', \App\Http\Controllers\Learn\InputItemController::class);

    Route::get('/create_item', \App\Http\Controllers\Learn\CreateItemController::class)
    ->name('create.item');

    Route::post('/create_item', \App\Http\Controllers\Learn\CreateItemController::class);

    Route::get('/edit_time', \App\Http\Controllers\Learn\EditTimeController::class)
    ->name('edit.time');

    Route::post('/edit_time', \App\Http\Controllers\Learn\EditTimeController::class);

    Route::get('/delete_time', \App\Http\Controllers\Learn\DeleteController::class)
    ->name('delete.item');

    Route::post('/delete_time', \App\Http\Controllers\Learn\DeleteController::class);
});

Route::get('/user_register', \App\Http\Controllers\ProfilePage\IndexController::class)
->name('user.register');

Route::get('/user_login', \App\Http\Controllers\ProfilePage\LoginController::class)
->name('user.login');


Route::post('/user/create', [RegisteredUserController::class, 'store'])
->name('user.create');

require __DIR__.'/auth.php';
