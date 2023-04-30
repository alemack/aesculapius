<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\ShowController;
use App\Http\Controllers\Admin\User\IndexController;
use App\Http\Controllers\Admin\User\UpdateController;
use App\Http\Controllers\Admin\User\DestroyController;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/users', [UserController::class, 'index'])->name('user.index');

// Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'admin'], function() {
//     Route::get('/users', [AdminController::class, 'index'])->name('admin.user.index');
// });

Route::group(['prefix'=>'admin', 'namespace' => 'Admin', 'middleware'=> 'admin'], function() {
    Route::group(['prefix'=>'user', 'namespace' => 'User'], function () {
        Route::get('/users', [IndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('/users/{user}', [ShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('users/{user}/edit', [EditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('users/{user}', [UpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('users/{user}', [DestroyController::class, '__invoke'])->name('admin.user.delete');
    });
});
