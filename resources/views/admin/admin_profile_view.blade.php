@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="content-body">  
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                            <div class="profile-photo">
                                <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('/upload/no_image.png')}}" class="img-fluid rounded-circle" style="object-fit: cover; width:150px; height: 150px;" alt="profileImg">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-name">
                                                <h4 class="text-primary">{{$profileData->name}}</h4>
                                                <p>{{$profileData->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- start of about me and change password --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">About Me</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Change Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content">

                                    <div id="about-me" class="tab-pane fade active show">

                                        <div class="row">

                                            <div class="pt-3 col-6">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{$profileData->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                        <div class="col-9"><span>{{$profileData->email}}</span>
                                                        </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Phone <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span>{{$profileData->phone}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Address <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{$profileData->address}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-3 col-6">
                                                <h4 class="text-primary mb-4">Update Information</h4>
                                                <form class="forms-sample" method="POST" action="{{ route('admin.profile.store')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control capitalize-first" autocomplete="off" name="name" value="{{$profileData->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{$profileData->email}}">
                                                    </div>
                                                    <div class="fomr-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="number" class="form-control capitalize-first" autocomplete="off" name="phone" value="{{$profileData->phone}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control" autocomplete="off" name="address" value="{{$profileData->address}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Photo</label>
                                                        <input id="image" type="file" class="form-control" autocomplete="off" name="photo">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label"></label>
                                                        <img id="showImage" class="wd-50 rounded-circle" style="width: 100px; height: 100px; object-fit: cover;" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('/upload/no_image.png')}}" alt="profile">
                                                    </div>

                                                    <button class="btn btn-primary me-2" type="submit">Update</button>

                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Update Password</h4>
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" placeholder="Email" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="Password" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" placeholder="1234 Main St" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address 2</label>
                                                        <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>State</label>
                                                            <select class="form-control" id="inputState">
                                                                <option selected="">Choose...</option>
                                                                <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Zip</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="gridCheck">
                                                            <label for="gridCheck" class="form-check-label">Check me out</label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Sign
                                                        in</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


<script type="text/javascript"> 

//jquery for changing photo

    $(document).ready(function() {
      $('#image').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  
  </script>

@endsection