@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <div class="">
        <form class="flex flex-col" action="{{route('admin.control.client.edit', $id)}}" method="POST">
            @csrf
            @method('patch')
            <p>{{$user->first_name}} {{$user->second_name}} {{$user->middle_name}}</p>
            <select name="role_id" id="role_id">
                <option value="{{$user->role_id}}" selected>{{$roles->where('id', '=', $user->role_id)->first()->role}}</option>
                @foreach ($roles as $r)
                    @if ($user->role_id == $r->id)
                        @continue
                    @endif
                    <option value="{{$r->id}}">{{$r->role}}</option>
                @endforeach
            </select>

            <ul style="color: rgba(255, 0, 0, 0.5)">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="submit">Изменить</button>
        </form>
    </div>
@endsection
