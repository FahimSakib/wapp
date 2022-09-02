<?php

use App\Http\Controllers\Frontend\IndexController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([], function(){
    route::get('/',[IndexController::class, 'index'])->name('index');
    Route::get('about', function () {
        return view('frontend.pages.about');
    })->name('about');
    Route::get('courses', function () {
        return view('frontend.pages.courses');
    })->name('courses');
    Route::get('events', function () {
        return view('frontend.pages.events');
    })->name('events');
    Route::get('teachers', function () {
        return view('frontend.pages.teachers');
    })->name('teachers');
});

// 'middleware' => 'auth'