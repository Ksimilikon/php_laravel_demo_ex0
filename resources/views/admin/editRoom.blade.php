@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <div class="">
        <form class="flex flex-col" action="{{route('admin.control.rooms.edit', $id)}}" method="POST">
            @csrf
            @method('put')
            <input name="floor" id="floor" type="number" placeholder="Номер этажа" value="{{$data->floor}}">
            <input name="number" id="number" type="number" placeholder="Номер комнаты" value="{{$data->number}}">
            <label for="categorie_id">Категория</label>
            <select name="categorie_id" id="categorie_id">
                <option value="{{$data->categorie_id}}" selected>{{$categories->where('id', '=', $data->categorie_id)->first()->name}}</option>
                @foreach ($categories as $c)
                    @if ($data->categorie_id == $c->id)
                        @continue
                    @endif
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
            <input name="cost" id="cost" type="number" placeholder="Цена" value="{{$data->cost}}">

            <ul style="color: rgba(255, 0, 0, 0.5)">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="submit">Создать</button>
        </form>
        <form action="{{route('admin.control.rooms.destroy', $id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" style="background-color: red;padding: 2px 4px; border-radius: 5px;">Удалить</button>
        </form>
    </div>
@endsection