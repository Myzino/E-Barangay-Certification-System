<style>
    .text-left {    
        text-align: left;
    }
</style>
<!-- Edit Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $clearance->id }}">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="editModal{{ $clearance->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Resident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $clearance->id }}" action="{{ route('clearance.update', ['id' => $clearance->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group text-left">
                        <label for="">Name:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="" name="name" value="{{ $clearance->name }}" required>
                    </div>

                    <div class="form-group text-left">
                        <label for="editPhone{{ $clearance->id }}">Phone:</label>
                        <input type="number" class="form-control opacity-75 mb-2" id="editPhone{{ $clearance->id }}" name="phone" value="{{ $clearance->phone }}" required>
                    </div>

                    <div class="form-group text-left">
                        <label for="editAddress{{ $clearance->id }}">Address:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="editAddress{{ $clearance->id }}" name="address" value="{{ $clearance->address }}" required>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>