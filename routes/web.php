<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\roles\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\roles\CleanerMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\roles\ServicePersonalMiddleware;
use App\Http\Middleware\roles\UserMiddleware;
use App\Models\Role;
use Illuminate\Support\Facades\Route;


Route::get('/', [GuestController::class, 'mainView'])->name('main');
Route::middleware(GuestMiddleware::class)->group(function (){

    //Guest
    Route::get("/auth", [GuestController::class, 'authCreate'])->name("auth");
    Route::post("/auth", [GuestController::class, 'authUser'])->name('auth.store');
    Route::get("/reg", [GuestController::class, 'regCreate'])->name("reg");
    Route::post("/reg", [GuestController::class, 'createUser'])->name('reg.store');
    


});

Route::middleware(AuthMiddleware::class)->group(function (){
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/account', function(){
        return view('user.account');
    })->name('account');
    Route::middleware(UserMiddleware::class)->group(function () {
        //user
        Route::get('/booking', [UserController::class, 'showBooking'])->name('booking');
    });
    Route::middleware(AdminMiddleware::class)->group(function (){
        //admin
        Route::get('/adminPanel', [AdminController::class, 'showPanel'])->name('adminPanel');
        Route::get('/adminPanel/control/rooms', [AdminController::class, 'showRooms'])->name('admin.control.rooms');
        Route::get('/adminPanel/control/worker', [AdminController::class, 'showWorkers'])->name('admin.control.roles');

    });
    Route::middleware(CleanerMiddleware::class)->group(function (){
        Route::get("/cleaner", function (){
            return "cleaner";
        });
    });
    Route::middleware(ServicePersonalMiddleware::class)->group(function(){

    });
});

