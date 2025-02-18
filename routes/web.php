<?php

use App\Http\Controllers\GuestController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CleanerMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\ServicePersonalMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\Role;
use Illuminate\Support\Facades\Route;


Route::get('/', [GuestController::class, 'mainView'])->name('main');
Route::middleware(GuestMiddleware::class)->group(function (){
    Route::get("/auth", [GuestController::class, 'authCreate'])->name("auth");
    Route::post("/auth", [GuestController::class, 'authUser'])->name('auth.store');
    Route::get("/reg", [GuestController::class, 'regCreate'])->name("reg");
    Route::post("/reg", [GuestController::class, 'createUser'])->name('reg.store');


});

Route::middleware(AuthMiddleware::class)->group(function (){
    Route::middleware(UserMiddleware::class)->group(function () {
        //user
        Route::get('/account', function(){
            return view('user.account');
        })->name('account');
    });
    Route::middleware(AdminMiddleware::class)->group(function (){
        //admin
        
    });
    Route::middleware(CleanerMiddleware::class)->group(function (){
        Route::get("/cleaner", function (){
            return "cleaner";
        });
    });
    Route::middleware(ServicePersonalMiddleware::class)->group(function(){

    });
});

