<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShiperController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    // auth user routes
    Route::get('/', function () {
        return view('home');
    })->name('home')->middleware('authorization');

    Route::get('/adminHome', function () {
        return view('home');
    })->name('AdminHome');

    Route::get('/OurProducts', function () {
        return view('products');
    })->name('our.products');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/profile/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('show', ['user' => $user]);
    })->name('profile');

    Route::group(['middleware' => 'can:admin'], function () {

        // admin routes
        Route::resource('/userdashboard', UserController::class);
        Route::get('/dashboauserrd_search', [UserController::class, 'search'])->name('userdashboard.search');

        Route::resource('/productdashboard', ProductController::class);
        Route::get('/productdashboard_search', [ProductController::class, 'search'])->name('productdashboard.search');

        Route::resource('/shipperdashboard', ShiperController::class);
        Route::get('/shipperdashboard_search', [ShiperController::class, 'search'])->name('shipperdashboard.search');

        Route::get('/messagedashboard', [MessageController::class, 'index'])->name('messagedashboard.index');
        Route::delete('/messagedashboard/{id}', [MessageController::class, 'destroy'])->name('messagedashboard.destroy');


        // promote user to admin
        Route::post('/promote/{id}', function ($id) {
            $user = User::findOrFail($id);
            $user->update(['role' => 'admin']);
            return redirect()->route('userdashboard.index')->with('success', 'USER_PROMOTED');
        })->name('promote');

        // demote admin to user
        Route::post('/demote/{id}', function ($id) {
            $user = User::findOrFail($id);
            $user->update(['role' => 'user']);
            return redirect()->route('userdashboard.index')->with('success', 'USER_DEMOTED');
        })->name('demote');

    });

    // edit profile
    Route::get('/user/{userdashboard}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{userdashboard} ', [UserController::class, 'update'])->name('user.update');

    Route::post('/message', [MessageController::class, 'store'])->name('StoreMessage');
});
Route::get('locale/{lang}', [LocalController::class, 'setLocale'])->middleware('loc');




