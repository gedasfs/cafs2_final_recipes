<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

// Route::prefix('/auth')->name('auth.')->group(function() {
//     Route::get('/', function() {
//         return redirect()->route('auth.login');
//     });

//     Route::get('/login', function() {
//         return view('authorization.login');
//     })->name('login');

//     Route::get('/register', function() {
//         return view('authorization.register');
//     })->name('register');

//     Route::get('/forgot-password', function() {
//         return view('authorization.forgot-password');
//     })->name('password.request');
// });

Route::prefix('/recipes')->name('recipes.')->group(function () {
    Route::get('/', function() {
        return view('recipes.index');
    })->name('index');

    Route::get('/create', function() {
        return view('recipes.create');
    })->name('create')->middleware(['auth', 'verified']);



});

Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/', function() {
        return view('categories.index');
    })->name('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
