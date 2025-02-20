<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showPanel(){
        return view('admin.panel');
    }
    public function showRooms() {
        return view('admin.panel');
    }
    public function showWorkers(){
        return view('admin.panel');
    }
}
