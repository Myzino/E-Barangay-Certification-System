@extends('app.dashboard')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">

            <div class="mb-2">
              <!-- Image row -->
              <div class="d-flex align-items-center justify-content-center">
                <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('/upload/admin_images/'.$profileData->photo) : url('../assets/upload/no_image.png')}}" alt="profile">
              </div>
            </div>
            
            <div class="mb-2">
              <!-- Name row -->
              <div class="d-flex align-items-center justify-content-center">
                <span class="h4 capitalize-first text-center">{{ $profileData->name }}</span>
              </div>
            </div>
            

            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
              <p class="text-muted capitalize-first">{{ $profileData->name }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{ $profileData->phone }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{ $profileData->email }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{ $profileData->address }}</p>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->

      <div class="col-md-8 col-xl-8 right-wrapper">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Update Tenant Profile</h6>
              <form class="forms-sample" method="POST" action="{{ route('app.profile.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label">Username</label>
                      <input type="text" class="form-control" autocomplete="off" name="username" value="{{$profileData->username}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label">Name</label>
                      <input type="text" class="form-control capitalize-first" autocomplete="off" name="name" value="{{$profileData->name}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email Address</label>
                      <input type="email" class="form-control" name="email" value="{{$profileData->email}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label">Phone</label>
                      <input type="number" class="form-control capitalize-first" autocomplete="off" name="phone" value="{{$profileData->phone}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Address</label>
                      <input type="text" class="form-control" autocomplete="off" name="address" value="{{$profileData->address}}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Photo</label>
                      <input id="image" type="file" class="form-control" autocomplete="off" name="photo">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('/supload/admin_images/'.$profileData->photo) : url('../assets/upload/no_image.png')}}" alt="profile">
                  </div>
                  
                  <button type="submit" class="btn btn-primary me-2">Save Changes</button>
              </form>

            </div>
          </div>

      </div>
    </div>

</div>

<script type="text/javascript"> 

  $(document).ready(function() {//jquery for changing photo
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