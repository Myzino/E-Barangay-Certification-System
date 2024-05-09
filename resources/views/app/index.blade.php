@extends('app.dashboard')
@section('content')
        {{-- @role('secretary');
        <x-btn-link href="{{ route('users.index')}}">Users</x-btn-link>
        @endrole --}}

        @role('secretary');
        <x-btn-link href="{{ route('users.index')}}" style="position: absolute; margin: auto; top: 0; left: 0; bottom: 0; right: 0; width: 100px; height: 50px;">Users</x-btn-link>
        @endrole

@endsection