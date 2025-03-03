@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <div class="">
        <a href="{{route('admin.create.role.show')}}"><button>Создать роль</button></a>
    </div>
    <ul>
        @foreach ($types as $t)
           <li><a href="{{route('admin.control.clients.show', $t->id)}}">{{$t->role}}</a></li> 
        @endforeach
        
    </ul>
@endsection