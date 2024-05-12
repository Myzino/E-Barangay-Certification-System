<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <link rel="icon" href="{{ asset('../../assets/barangay.png') }}" type="image/png">
        <title>E-Barangay - Admin</title>

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
        <link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}">
        <!-- endinject -->
    
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}">
        <!-- End plugin css for this page -->
    
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('../assets/fonts/feather-font/css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <!-- endinject -->
    
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('../assets/css/demo1/style.css') }}">
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

        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Add Tenants') }}
                  <a class="float-right btn btn-secondary" href="{{ route('tenants.index') }}">Back</a>

                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <form method="POST" action="{{ route('tenants.store') }}">
                                @csrf
                        
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                        
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="domain-name" :value="__('Domain Name')" />
                                    <x-text-input id="domain-name" class="block mt-1 w-full" type="text" name="domain-name" :value="old('domain-name')" required autofocus autocomplete="domain-name" />
                                    <x-input-error :messages="$errors->get('domain-name')" class="mt-2" />
                                </div>
                        
                                <!-- Password -->
                                {{-- <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                        
                                    <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div> --}}
                        
                                <!-- Confirm Password -->
                                {{-- <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div> --}}
                        
                                <div class="flex items-center justify-end mt-5">
                                
                        
                                    <button class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </form>
                        


                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>

    </body>
</html>
