{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
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

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.guest_layout')
@section('content')
<div class="account-content">
    <div class="login-wrapper">
        <div class="login-content">
            <div class="login-userset">
                <div class="login-logo">
                    <img src="{{asset('admin/assets/img/logo.png')}}" alt="img">
                </div>
                <div class="login-userheading">
                    <h3>Create an Account</h3>
                    <h4>Continue where you left off</h4>
                </div>
                <div class="form-login">
                    <label>Full Name</label>
                    <div class="form-addons">
                        <input type="text" placeholder="Enter your full name">
                        <img src="{{asset('admin/assets/img/icons/users1.svg')}}" alt="img">
                    </div>
                </div>
                <div class="form-login">
                    <label>Email</label>
                    <div class="form-addons">
                        <input type="text" placeholder="Enter your email address">
                        <img src="{{asset('admin/assets/img/icons/mail.svg')}}" alt="img">
                    </div>
                </div>
                <div class="form-login">
                    <label>Password</label>
                    <div class="pass-group">
                        <input type="password" class="pass-input" placeholder="Enter your password">
                        <span class="fas toggle-password fa-eye-slash"></span>
                    </div>
                </div>
                <div class="form-login">
                    <a class="btn btn-login">Sign Up</a>
                </div>
                <div class="signinform text-center">
                    <h4>Already a user? <a href="signin.html" class="hover-a">Sign In</a></h4>
                </div>
                <div class="form-setlogin">
                    <h4>Or sign up with</h4>
                </div>
                <div class="form-sociallink">
                    <ul>
                        <li>
                            <a href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/google.png')}}" class="me-2" alt="google">
                                Sign Up using Google
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img src="{{asset('admin/assets/img/icons/facebook.png')}}" class="me-2" alt="google">
                                Sign Up using Facebook
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-img">
            <img src="{{asset('admin/assets/img/login.jpg')}}" alt="img">
        </div>
    </div>
</div>
@endsection
