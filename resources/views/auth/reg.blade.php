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
    <form class="flex flex-col" style="gap: 5px" action="{{route('reg.store')}}" method="POST">
        @csrf
        <input type="text" name="first_name" id="first_name" placeholder="{{__("Имя")}}" required>
        <input type="text" name="second_name" id="second_name" placeholder="{{__("Фамилия")}}" required>
        <input type="text" name="middle_name" id="middle_name" placeholder="{{__("Отчество, не заполнять при отсутствии")}}">
        
        <input type="email" name="email" id="email" placeholder="email" required>
        <input type="password" name="password" id="password" placeholder="{{__('Пароль')}}" required>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__('Повтор пароля')}}" required>
        <button type="submit">{{__('Зарегистроваться')}}</button>
    </form>
</div>
@endsection