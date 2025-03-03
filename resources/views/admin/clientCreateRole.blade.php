@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <div class="">
        <form class="flex flex-col" action="{{route('admin.create.role.create')}}" method="POST">
            @csrf
            <input name="role" id="role" type="text" value="{{old('role')}}" required style="border:1px solid black; margin: 7px 3px">

            <ul style="color: rgba(255, 0, 0, 0.5)">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="submit">Создать</button>
        </form>
    </div>
@endsection
