<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration Page E-Barangay</title>
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
                                    <h4 class="text-center mb-4">Register your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf   
                                        <div class="form-group">
                                            <label for="name"><strong>Name</strong></label>
                                            <input type="text" id="name" class="form-control" placeholder="name" name="name" required>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-muted" />

                                        </div>
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" id="email" class="form-control" placeholder="hello@example.com" name="email" required>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-muted" />
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input type="password" id="password" class="form-control" value="Password" name="password" required>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-muted" />
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation"><strong>Confirm Password</strong></label>
                                            <input type="password" id="password" class="form-control" value="Password" name="password_confirmation" required>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-muted" />
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Register me up</button>
                                        </div>
                                        <p class="my-1 text-center font-weight-bold">or</p>
                                        {{-- google part --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="sbtn btn-lg btn-google btn-block text-uppercase btn-outline d-flex align-items-center justify-content-center" href="{{ route('google-auth') }}" ><img src="https://img.icons8.com/color/16/000000/google-logo.png" class="mx-2"> Sign in Using Google</a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>