@extends('app.dashboard')
@section('content')

<div class="page-content">

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                    <h6 class="card-title">Residents Table</h6>    
                    
	                <!-- Add Student Modal -->
                    {{-- @include('student.add') --}}
                </div>

                {{-- Student TAble --}}
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Phone #</th>
                        <th>Address</th>
                        <th>Certificate</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($students as $student)
                            <tr>
                                <td>{{ ucfirst($student->name) }}</td>
                                <td>{{ ucfirst($student->address) }}</td>
                                <td>{{ $student->age }}</td>
                                <td>
                                    @include('student.edit')
                                    @include('student.delete')
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>

</div>

@endsection