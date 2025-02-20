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
            'middle_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'max:255', 'min:3', 'confirmed'],  
        ],
        [
            'first_name.required' => 'Поле "Имя" обязательно для заполнения.',
            'first_name.string' => 'Поле "Имя" должно быть строкой.',
            'first_name.max' => 'Поле "Имя" не должно превышать 255 символов.',

            'second_name.required' => 'Поле "Фамилия" обязательно для заполнения.',
            'second_name.string' => 'Поле "Фамилия" должно быть строкой.',
            'second_name.max' => 'Поле "Фамилия" не должно превышать 255 символов.',

            'middle_name.string' => 'Поле "Отчество" должно быть строкой.',
            'middle_name.max' => 'Поле "Отчество" не должно превышать :255 символов.',

            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.string' => 'Поле "Email" должно быть строкой.',
            'email.lowercase' => 'Поле "Email" должно содержать только строчные буквы.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Поле "Email" не должно превышать 255 символов.',
            'email.unique' => 'Этот адрес электронной почты уже занят.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string' => 'Поле "Пароль" должно быть строкой.',
            'password.max' => 'Поле "Пароль" не должно превышать 255 символов.',
            'password.min' => 'Пароль должен содержать минимум 3 символа.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
        ]
        );
        

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
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:255']
        ],[
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Поле "Email" не должно превышать :max символов.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string' => 'Поле "Пароль" должно быть строкой.',
            'password.min' => 'Пароль должен содержать минимум :min символов.',
            'password.max' => 'Поле "Пароль" не должно превышать :max символов.',
        ]);
        if(Auth::attempt($data)){
            return redirect()->route('account');
        }
        
        return back()->withErrors(['email'=>"Такой почты не существует", 'password'=>'Неверный пароль']);
        
    }
    
}
