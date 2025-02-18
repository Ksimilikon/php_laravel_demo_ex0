@extends('layouts.MainLayout')
@section('title')
{{__("Авторизация")}}
@endsection
@section('main')
<div>
    <form class="flex flex-col" action="{{route('auth.store')}}" method="post">
        @csrf
        <div class="">
            <input type="email" name="email" id="email" placeholder="email">
            <div class="error-text">{{$errors->get('email')}}</div>
        </div>
        <div class="">
            <input type="password" name="password" id="password" placeholder="password">
            <div class="error-text">{{$errors->get('password')}}</div>
        </div>
        
        <input type="submit" value="Войти">
    </form>
</div>
@endsection