@extends('layouts.adminPanel')
@section('title')
    Админ панель
@endsection
@section('mainPanel')
    <div class="">
        <form class="flex flex-col" action="{{route('admin.control.rooms.create')}}" method="POST">
            @csrf
            <input name="floor" id="floor" type="number" placeholder="Номер этажа">
            <input name="number" id="numbe" type="number" placeholder="Номер комнаты">
            <label for="categorie_id">Категория</label>
            <select name="categorie_id" id="categorie_id">
                <option value="0" selected disabled>Не выбрано</option>
                @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
            <input name="cost" id="cost" type="number" placeholder="Цена">

            <ul style="color: rgba(255, 0, 0, 0.5)">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="submit">Создать</button>
        </form>
    </div>
@endsection