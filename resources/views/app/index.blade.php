@extends('app.dashboard')
@section('content')
        {{-- @role('secretary');
        <x-btn-link href="{{ route('users.index')}}">Users</x-btn-link>
        @endrole --}}
        <div class="page-content">



                <div class="card">
                        <div class="card-body">
                                <h5 class="card-title">Welcome to Certificate Generation</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Generate Certificates for Residents</h6>
                                <p class="card-text mb-3">Empower your barangay administration with the ability to swiftly generate essential certificates for residents. From barangay indigency to barangay residency, streamline your administrative processes effortlessly.</p>
                
                                @role('official|secretary')  
                                <a href="{{ route('users.index')}}" class="btn btn-primary">Users</a>
                                @endrole
                        </div>
                </div>

                <div class="d-flex justify-content-evenly my-4">

                        <div class="card col-3">
                                <img src="{{ asset('../../indigency.png') }}" class="card-img-top" alt="indigency">
                                <div class="card-body">
                                    <h5 class="card-title">Barangay Indigency</h5>
                                    <p class="card-text mb-3">The Barangay Indigency certificate is issued to residents who are in need of assistance and support from the barangay.</p>
                                    <a href="{{ route('indigency.index') }}" class="btn btn-primary">Create PDF</a>
                                </div>
                            </div>
                        <div class="card col-3">
                                <img src="{{ asset('../../clearance.png') }}" class="card-img-top" alt="clerance">
                                <div class="card-body">
                                        <h5 class="card-title">Barangay Clearance</h5>
                                        <p class="card-text mb-3">The Barangay Clearance is a document that certifies an individual has no criminal records within the jurisdiction.</p>                                        
                                        <a href="{{ route ('clearance.index') }}" class="btn btn-primary">Create PDF</a>
                                </div>
                        </div>
                        <div class="card col-3">
                                <img src="{{ asset('../../residency.png') }}" class="card-img-top" alt="Barangay Residency">
                                <div class="card-body">
                                    <h5 class="card-title">Barangay Residency</h5>
                                    <p class="card-text mb-3">The Barangay Residency certificate confirms an individual's residency within the barangay, often required for official transactions.</p>
                                    <a href="{{ route('residency.index') }}" class="btn btn-primary">Create PDF</a>
                                </div>
                        </div>
                </div>

        </div>

@endsection