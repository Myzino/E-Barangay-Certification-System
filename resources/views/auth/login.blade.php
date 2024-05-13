<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <!-- Change the href attribute to the path of your icon file -->
  <link rel="icon" href="{{ asset('../../../assets/certitech.png') }}" type="image/png">

	<title>E-Barangay Login Page</title>


  {{-- custome style for image --}}
  <style type="text/css">
      /* if you ever want to get something in public just name it asset */
      .authLogin-side-wrapper {
          width: 100%;
          height: 100%;
          background-image: url({{asset('assets/login.png')}})    
      }
  </style>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('../../../assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('../../../assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('../../../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('../../../assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

</head>
<body>
    <img src="" alt="">
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="authLogin-side-wrapper">
                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                    <a href="{{route('welcome')}}" style="position: absolute; top: 2%; right: 2%;">Back</a>
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2">E-<span>Barangay</span></a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

                    <form class="forms-sample" method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input autocomplete="off" type="text" name="email" class="form-control" id="email" placeholder="Email" >
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input autocomplete="off" type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                      <!-- Remember Me -->
                      <div class="form-check mb-3">
                        <label for="authCheck" class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remember">
                            Remember me
                        </label>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                        Login
                        </button>
                      </div>
                      <div class="d-flex justify-content-between mt-4">                    
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <a href="{{ route('register') }}" class="text-muted ms-1">Not a user? Sign up</a>

                      </div>
                    
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

	<!-- core:js -->
	<script src="{{ asset('../../../assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('../../../assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('../../../assets/js/template.js') }}"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<!-- End custom js for this page -->
</body>
</html>