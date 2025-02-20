@extends('layouts.MainLayout')
@section('header')
    @php
        $role = Auth::user()->role_id;
    @endphp
    @if ($role == 2)
        <a href="{{route('adminPanel')}}">{{__("Админ панель")}}</a>
    @endif
    
@endsection
@section('title')
    Аккаунт   
@endsection
@section('main')
<div class="" style="gap: 5px">
    <div class="info" style="background-color: aliceblue; border-radius: 5px">
        @php
            $user = Auth::user();   
        @endphp
        <p>{{$user->first_name}}</p>
        <p>{{$user->second_name}}</p>
        <p>{{$user->middle_name}}</p>

    </div>
</div>
@endsection