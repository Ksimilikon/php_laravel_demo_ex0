@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <div class="">
        <h1>{{$roleName}}</h1>
        <div>
            @foreach ($users as $u)
                <div class="">
                    <a href="{{route('admin.control.clients.edit', $u->id)}}"><p>{{$u->first_name}} {{$u->second_name}} {{$u->middle_name}}</p></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection