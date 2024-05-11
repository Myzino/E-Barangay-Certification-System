<!-- Add Student Button -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addResidentModal">
    Add Clearance Resident
</button>

{{-- ADD MODAL --}}
<div class="modal fade" id="addResidentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Clearance Resident</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="addResidentForm" action="{{ route('clearance.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="addName">Name:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addName" name="name" placeholder="Enter Name" required>
                    </div>

                    <div class="form-group">
                        <label for="addPhone">Phone Number:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addPhone" name="phone" placeholder="Enter Phone Number" required>
                    </div>

                    <div class="form-group">
                        <label for="addAddress">Address:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addAddress" name="address" placeholder="Enter Address" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Resident</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>