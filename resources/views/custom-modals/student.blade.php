<!-- resources/views/student/edit.blade.php -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                <a href="{{route('student')}}"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button></a>    
            </div>
            <div class="modal-body">
                <!-- Your form for editing student details -->
                <form id="editForm">
                    @csrf
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="editAddress" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="editAge" class="form-label">Age</label>
                        <input type="text" class="form-control" id="editAge" name="age">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{route('student')}}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
                <button type="button" class="btn btn-primary" onclick="submitEditForm()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitEditForm() {
        // Add your AJAX code here to submit the form data
        // For simplicity, you can use a library like Axios or jQuery.ajax
        // Example using Axios:
        // axios.post('/students/update', $('#editForm').serialize())
        //     .then(response => {
        //         console.log(response.data);
        //         // Optionally, close the modal or perform other actions on success
        //         $('#editModal').modal('hide');
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
    }
</script>