@extends('layouts.MainLayout')
@section('main')
<div class="">
    @php
        function currentPage($routeName) : string {
            if(url()->current() == route($routeName)){
                return "style='border-bottom:1px solid black;border-radius:5px;'";
            }
            else{
                return '';
            }
        }
    @endphp
    <header class="flex flex-row bg-gray-50" style="gap: 10px;">
        <a href="{{route('admin.control.roles')}}" @php echo currentPage('admin.control.roles') @endphp>Распределить роли сотрудников</a>
        <a href="{{route('admin.control.rooms')}}" @php echo currentPage('admin.control.rooms') @endphp>Управление комнатами</a>
        <a href=""></a>
        
    </header>
    @yield('mainPanel')
</div>
@endsection

