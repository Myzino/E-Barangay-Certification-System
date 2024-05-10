<style>
    .text-left {
        text-align: left;
    }
</style>
<!-- Edit Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $resident->id }}">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="editModal{{ $resident->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Resident</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $resident->id }}" action="{{ route('resident.update', ['id' => $resident->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group text-left">
                        <label for="">Name:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="" name="name" value="{{ $resident->name }}" required>
                    </div>

                    <div class="form-group text-left">
                        <label for="editPhone{{ $resident->id }}">Phone:</label>
                        <input type="number" class="form-control opacity-75 mb-2" id="editPhone{{ $resident->id }}" name="phone" value="{{ $resident->phone }}" required>
                    </div>

                    <div class="form-group text-left">
                        <label for="editAddress{{ $resident->id }}">Address:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="editAddress{{ $resident->id }}" name="address" value="{{ $resident->address }}" required>
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