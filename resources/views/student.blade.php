@extends('dashboard')
@section('content')

@include('custom-tables.student-table')

<!-- Include the Edit Student Modal -->
@include('custom-modals.student')

@endsection