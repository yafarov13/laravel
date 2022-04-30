<?php

use App\Http\Controllers\Account\IndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController as AdminUsersController;
use App\Http\Controllers\AgregatorController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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


Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'account', 'as' => 'account.'], function(){
        Route::get('/', IndexController::class)->name('index');
        //logout
        Route::get('logout', function(){
            Auth::logout();
            return redirect()->route('login');
        })->name('logout');
    });
    
    //Admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUsersController::class);

        Route::get('parser', ParserController::class)->name('parser');
    });
});



Route::get('session', function () {
    $name = 'exampleSession';
    if (session()->has($name)) {
        dd(session()->all(), session()->get($name));
        session()->forget($name);
    }
    session([$name => 'test']);
});


Auth::routes();

//socials routes
Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
    ->where('network', '\w+')
    ->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
    ->where('network', '\w+')
    ->name('auth.callback');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
