<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <link rel="icon" href="{{ asset('../../assets/barangay.png') }}" type="image/png">
        <title>Welcome - Tenant</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    
    
        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- End fonts -->
    
        <!-- core:css -->
        <link rel="stylesheet" href="{{ asset('../../assets/vendors/core/core.css') }}">
        <!-- endinject -->
    
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('../../assets/vendors/flatpickr/flatpickr.min.css') }}">
        <!-- End plugin css for this page -->
    
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('../../assets/fonts/feather-font/css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ asset('../../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <!-- endinject -->
    
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('../../assets/css/demo1/style.css') }}">
        <!-- End layout styles -->
    
        {{-- toaster for update notif --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        
        <!-- Styles -->
        <style>
            .welcome-tenant {
                line-height: 1rem;
            }
            .center {
                text-align: center;
            }
            .welcome-btn-con {
                display: flex;
                justify-content: center;
                gap:4rem;
            }

        </style>

    </head>
    <body>
      
        <x-tenant-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Users') }}
                    <a class="btn btn-success float-right" href="{{ route('users.create') }}">Add Users</a>
                </h2>
            </x-slot>


            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <table class="table table table-bordered" style="width: 100%; text-align:center;">
          
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $user)
                                  <tr >
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                      @foreach($user->roles as $role)
                                      {{ $role -> name }} {{ $loop -> last ? '': ','}}
                                    
                                    @endforeach
                                    </td>
                                    <td class="px-6 py-4">
                                      <a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}">Edit</a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-tenant-app-layout>

    </body>
</html>
