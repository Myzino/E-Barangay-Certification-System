
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('./images/favicon.png')}}">
    <link href="{{asset('./css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your Account</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input name="email" type="email" class="form-control" value="admin@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input name="password" type="password" class="form-control">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>

                                        <p class="my-2 text-center font-weight-bold">or</p>
                                        {{-- google part --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline d-flex align-items-center justify-content-center" href="{{ route('google-auth') }}" ><img src="https://img.icons8.com/color/16/000000/google-logo.png" class="mx-2"> Signup Using Google</a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="register">Sign up</a></p>
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
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('./vendor/global/global.min.js')}}"></script>
    <script src="{{asset('./js/quixnav-init.js')}}"></script>
    <script src="{{asset('./js/custom.min.js')}}"></script>

</body>

</html>