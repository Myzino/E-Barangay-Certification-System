@extends('app.dashboard')
@section('content')
        {{-- @role('secretary');
        <x-btn-link href="{{ route('users.index')}}">Users</x-btn-link>
        @endrole --}}
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                        <div class="d-flex justify-content-between">

                                @role('secretary')  {{-- only user thah has secretary role can access this button--}}
                                <a href="{{ route('users.index')}}" class="btn btn-primary">Tenant-Users</a>
                                @endrole
                                <a href="{{ route('resident.index')}}" class="btn btn-primary">Residents</a>
                                
                        </div>
                </div>
            </div>
        </div>

@endsection