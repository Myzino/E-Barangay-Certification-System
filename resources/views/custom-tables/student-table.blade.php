



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Students Table - CRUDS REFERENCE</h4>
                            <span class="ml-1">Datatable</span>
                        </div>  
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Datatable</h4>
                                <!-- Add New Student Button -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Student</button>
                            </div>
                            <div class="card-body">

                                <!-- Add New Student Modal -->
                                <div class="modal fade" id="addModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add New Student</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="addStudentForm" action="{{ route('student.store') }}" method="post">
                                                    @csrf
                                
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input type="text" class="form-control mb-2" id="addName" name="name" required>
                                                    </div>
                                
                                                    <div class="form-group">
                                                        <label>Address:</label>
                                                        <input type="text" class="form-control mb-2" id="addAddress" name="address" required>
                                                    </div>
                                
                                                    <div class="form-group">
                                                        <label>Age:</label>
                                                        <input type="number" class="form-control mb-2" id="addAge" name="age" required>
                                                     </div>
                                
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">

                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Age</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->address }}</td>
                                                    <td>{{ $student->age }}</td>
                                                    <td>
                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $student->id }}">Edit</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editModal{{ $student->id }}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Student</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="editForm{{ $student->id }}" action="{{ route('student.update', ['id' => $student->id]) }}" method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                        
                                                                            <div class="form-group">
                                                                                <label for="editName{{ $student->id }}">Name:</label>
                                                                                <input type="text" class="form-control" id="editName{{ $student->id }}" name="name" value="{{ $student->name }}" required>
                                                                            </div>
                                                        
                                                                            <div class="form-group">
                                                                                <label for="editAddress{{ $student->id }}">Address:</label>
                                                                                <input type="text" class="form-control" id="editAddress{{ $student->id }}" name="address" value="{{ $student->address }}" required>
                                                                            </div>
                                                        
                                                                            <div class="form-group">
                                                                                <label for="editAge{{ $student->id }}">Age:</label>
                                                                                <input type="number" class="form-control" id="editAge{{ $student->id }}" name="age" value="{{ $student->age }}" required>
                                                                            </div>
                                                        
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <!-- Delete Button -->
                                                        <form action="{{ route('student.destroy', ['id' => $student->id]) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Age</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--**********************************
            Content body end
        ***********************************-->
