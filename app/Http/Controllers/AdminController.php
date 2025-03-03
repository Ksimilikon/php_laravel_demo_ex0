<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showPanel(){
        return view('admin.panel');
    }
    public function showRooms() {
        $roomRows = Room::all();
        $floors = Room::distinct()->pluck('floor');
        return view('admin.controlRoom', ['data'=>$roomRows, 'floors'=>$floors]);
    }
    public function showWorkers(){
        $types = Role::all();
        return view('admin.clientShow', ['types'=>$types]);
    }
    public function showCreateRoom(){
        $categorie = Categorie::all();
        return view('admin.makeRoom', ['categories' => $categorie]);
    }
    public function createRoom(Request $request){
        $request->validate(
            [
                'floor'=>['required', 'integer'],
                'number'=>['required', 'integer'],
                'categorie_id'=>['required', 'integer'],
                'cost'=>['required', 'numeric'],
            ]
        );
        Room::create([
            'floor'=>$request->floor,
            'number'=>$request->number,
            'categorie_id'=>$request->categorie_id,
            'cost'=>$request->cost,
        ]);
        return redirect()->route('admin.control.rooms');
    }

    public function showEditRoom($id){
        $data = Room::find($id);
        $categorie = Categorie::all();
        return view('admin.editRoom', ['data'=>$data, 'categories' => $categorie, 'id'=>$id]);
    }
    public function editRoom(Request $request, $id) {
        $request->validate(
            [
                'floor'=>['required', 'integer'],
                'number'=>['required', 'integer'],
                'categorie_id'=>['required', 'integer'],
                'cost'=>['required', 'numeric'],
            ]
        );
        $room = Room::find($id);
        $room->update($request->only('floor', 'number', 'categorie_id', 'cost'));
        return redirect()->route('admin.control.rooms');
    }
    public function destroyRoom($id) {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('admin.control.rooms');
    }

    public function showTypeClient($roleId){
        $users = User::where('role_id', '=', $roleId)->get();
        $roleName = Role::find($roleId)->role;
        return view('admin.clientTypeShow', ['users'=>$users, 'roleName'=>$roleName]);
    }

    public function showEditClient($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.clientEdit', ['id'=>$id, 'user'=>$user, 'roles'=>$roles]);
    }
    public function editClient(Request $request, $id){
        $request->validate(['role_id'=>['required', 'integer']]);
        $user = User::find($id);
        $user->update($request->only('role_id'));
        return redirect()->route('admin.control.roles');
    }
    public function showCreateRole(){
        return view('admin.clientCreateRole');
    }
    public function createRole(Request $request){
        $request->validate(['role'=>['required', 'string', 'max:255']]);
        Role::create(['role'=>$request->role]);
        return redirect()->route('admin.control.roles');
    }
}
