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
use App\Models\Categorie;
use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', [GuestController::class, 'mainView'])->name('main');
Route::get('/load', function(){
    //autouser
    $rows = file('C:\Users\kirya\Downloads\Документы заказчика\Отчет по состоянию номерного фонда на дату.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($rows as $row){
        
    }

    //room from csv (export xlsx)
    // $categories= DB::table('categories')->select('id', 'name')->get();
    // //dd($categories);
    // $rows = file('C:\Users\kirya\Downloads\Документы заказчика\Номерной фонд.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // foreach ($rows as $row){
    //     $elems = explode(';', $row);
    //     $categorie = null;
    //     foreach($categories as $c){
    //         if($c->name==trim($elems[2])){
    //             $categorie = $c->id;
    //             break;
    //         }
    //     }
    //     $floor = explode(' ', $elems[0])[0];
    //     $floor = preg_replace('/[^\x20-\x7E]+/', '', $floor);
    //     // echo $categorie->name().' ';
    //     // dd($categorie->id);
    //     Room::create([
    //         'number'=>$elems[1],
    //         'floor'=>$floor,
    //         'cost'=>100,
    //         'categorie_id'=>$categorie,
    //     ]);
    // }

    //status room

});
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
        Route::get('/adminPanel/control/clients', [AdminController::class, 'showWorkers'])->name('admin.control.roles');
        Route::get('/adminPanel/control/rooms/create', [AdminController::class, 'showCreateRoom'])->name('admin.control.rooms.create');
        Route::post('adminPanel/control/rooms/create', [AdminController::class, 'createRoom'])->name('admin.control.rooms.create');

        Route::get('adminPanel/control/rooms/{id}/edit', [AdminController::class, 'showEditRoom'])->name('admin.control.rooms.edit');
        Route::put('adminPanel/control/rooms/{id}/edit', [AdminController::class, 'editRoom'])->name('admin.control.rooms.edit');
        Route::delete('adminPanel/control/rooms/{id}/edit', [AdminController::class, 'destroyRoom'])->name('admin.control.rooms.destroy');

        Route::get('/adminPanel/control/clients/{roleId}', [AdminController::class, 'showTypeClient'])->name('admin.control.clients.show');
        Route::get('/adminPanel/control/client/{id}', [AdminController::class, 'showEditClient'])->name('admin.control.clients.edit');
        Route::patch('/adminPanel/control/client/{id}', [AdminController::class, 'editClient'])->name('admin.control.client.edit');

        Route::get('/adminPanel/create/role', [AdminController::class, 'showCreateRole'])->name('admin.create.role.show');
        Route::post('/adminPanel/create/role', [AdminController::class, 'createRole'])->name('admin.create.role.create');


    });
    Route::middleware(CleanerMiddleware::class)->group(function (){
        Route::get("/cleaner", function (){
            return "cleaner";
        });
    });
    Route::middleware(ServicePersonalMiddleware::class)->group(function(){

    });
});

