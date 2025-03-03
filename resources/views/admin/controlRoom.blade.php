@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <ul>
        <li><a href="{{route('admin.control.rooms.create')}}">Создать комнату</a></li>
    </ul>
    <div class="">
        @foreach ($floors as $f)
            <div class="">
                <h2>Этаж {{$f}}</h2>
                <div class="">
                    @foreach ($data as $r)
                        @if ($r->floor == $f)
                            <a href="{{route('admin.control.rooms.edit', $r->id)}}"><button>{{$r->number}}</button></a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection