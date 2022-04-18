<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\AgregatorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
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
    return view('start');
})->name('start');


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])->where('news', '\d+')->name('news.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('category');
Route::get('/categories/{category}', [CategoryController::class, 'showNews'])->name('category.showNews');
Route::get('/categories/{category}/{news}', [CategoryController::class, 'showNewsId'])->name('category.showNewsId');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback/sent', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/agregator', [AgregatorController::class, 'index'])->name('agregator.index');
Route::post('/agregator/sent', [AgregatorController::class, 'store'])->name('agregator.store');


//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

