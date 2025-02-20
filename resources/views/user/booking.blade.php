<div>
    @extends('layouts.MainLayout')

@section('title')
    Бронирование 
@endsection
@section('main')
<div class="" style="gap: 5px">
    <div class="info" style="background-color: aliceblue; border-radius: 5px">
        <form action="{{route('booking')}}" method="POST">
            @csrf
            <select name="room" id="">
                @php
                    
                @endphp
                {{-- @foreach ()

                @endforeach --}}
            </select>
        </form>
    </div>
</div>
@endsection
</div>
