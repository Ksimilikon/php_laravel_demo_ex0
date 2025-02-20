@extends('layouts.MainLayout')
@section('title')
{{__("Регистрация")}}
@endsection
@section('main')
<div>
    <style>
        input{
            @apply border
        }
    </style>
    <div class="w-full sm:w-10 lg:w-6">
        <form class="flex flex-col" style="gap: 5px" action="{{route('reg.store')}}" method="POST">
            @csrf
            <input type="text" name="first_name" id="first_name" placeholder="{{__("Имя")}}" value="{{old("first_name")}}" required>
            <input type="text" name="second_name" id="second_name" placeholder="{{__("Фамилия")}}" value="{{old("second_name")}}" required>
            <input type="text" name="middle_name" id="middle_name" placeholder="{{__("Отчество, не заполнять при отсутствии")}}" value="{{old("middle_name")}}">
            
            <input type="email" name="email" id="email" placeholder="email" value="{{old("email")}}" required>
            <input type="password" name="password" id="password" placeholder="{{__('Пароль')}}" required>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__('Повтор пароля')}}" required>
            <ul style="color: rgba(255, 0, 0, 0.5)">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="submit">{{__('Зарегистроваться')}}</button>
        </form>
    </div>
</div>
@endsection