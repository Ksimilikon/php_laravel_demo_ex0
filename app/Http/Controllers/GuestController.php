<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function mainView(){
        return view('main');
    }

    public function authCreate(){
        return view("auth.auth");
    }
    public function regCreate(){
        return view("auth.reg");
    }
    public function createUser(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'max:255', 'min:3', 'confirmed'],
            
        ]);

        $user = User::create(
            [
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'middle_name' => $request->middle_name,
                'email' => $request->email,
                'password' => Hash::make($request->password), 
            ]
        );
        Auth::login($user);
        return redirect()->route('account');
    }
    public function authUser(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
    }
}
