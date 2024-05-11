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
                    <h6 class="card-title">Residents Table</h6>    
                    
	                <!-- Add Resident Modal -->
                    @include('app.residents.add')
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

                        @foreach($residents as $resident)
                            <tr>
                                <td class="align-middle">{{ ucfirst($resident->name) }}</td>
                                <td class="align-middle">{{ ucfirst($resident->phone) }}</td>
                                <td class="align-middle">{{ $resident->address }}</td>
                                <td>
                                  <div class="btn-group dropend">
                                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton_{{ $resident->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Choose a Certificate
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $resident->id }}">
                                          <a class="dropdown-item" href="#" onclick="updateCertificate({{ $resident->id }}, 'Barangay Indigency')">Barangay Indigency</a>
                                          <a class="dropdown-item" href="#" onclick="updateCertificate({{ $resident->id }}, 'Barangay Clearance')">Barangay Clearance</a>
                                          <a class="dropdown-item" href="#" onclick="updateCertificate({{ $resident->id }}, 'Barangay Residency')">Barangay Residency</a>
                                      </div>
                                  </div>
                                </td>
                                <td>
                                  {{-- Export Button --}}
                                  <button class="btn btn-info">Export</button>
                                    <!-- Delete Resident Modal -->
                                    @include('app.residents.edit')
                                    <!-- Delete Resident Modal -->
                                    @include('app.residents.delete')
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
