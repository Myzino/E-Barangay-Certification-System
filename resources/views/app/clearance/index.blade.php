<style>
td.align-middle { /* centering the data vertically */
    vertical-align: middle;
}

</style>

@extends('app.dashboard')
@section('content')

<div class="page-content">

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                    <h6 class="card-title">Clearance Residents Table</h6>    
                    
	                <!-- Add Resident Modal -->
                    @include('app.clearance.add')
                </div>

                {{-- Student TAble --}}
                <div class="table-responsive">
                  <table id="dataTableExample" class="table text-center">
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

                        @foreach($clearances as $clearance)
                            <tr>
                                <td class="align-middle">{{ ucfirst($clearance->name) }}</td>
                                <td class="align-middle">{{ ucfirst($clearance->phone) }}</td>
                                <td class="align-middle">{{ $clearance->address }}</td>
                                <td class="align-middle">Barangay Clearance</td>

                                <td>
                                  {{-- Export Button --}}
                                  <a class="btn btn-info" href="{{ route('pdf.clearance', ['clearanceName' => $clearance->name]) }}">Generate</a>
                                    <!-- Delete Resident Modal -->
                                    @include('app.clearance.edit')
                                    <!-- Delete Resident Modal -->
                                    @include('app.clearance.delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>

</div>

@endsection


{{-- script for dynamic choose of certificate (the choosen certificate will replace the default text) --}}
<script>

  function updateCertificate(residentId, certificate) {
    // Find the dropdown button element
    var dropdownButton = document.getElementById('dropdownMenuButton_' + residentId);
    
    // Update the dropdown button text to the selected certificate
    dropdownButton.innerText = certificate;
  }
  
</script>
