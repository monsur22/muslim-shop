{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.guest_layout')
@section('content')
<div class="account-content">
    <div class="login-wrapper">
        <div class="login-content">
            <div class="login-userset ">
                <div class="login-logo">
                    <img src="{{asset('admin/assets/img/logo.png')}}" alt="img">
                </div>
                <div class="login-userheading">
                    <h3>Forgot password?</h3>
                    <h4>Don’t warry! it happens. Please enter the address <br>
                        associated with your account.</h4>
                </div>
                <div class="form-login">
                    <label>Email</label>
                    <div class="form-addons">
                        <input type="text" placeholder="Enter your email address">
                        <img src="{{asset('admin/assets/img/icons/mail.svg')}}" alt="img">
                    </div>
                </div>
                <div class="form-login">
                    <a class="btn btn-login" href="signin.html">Submit</a>
                </div>
            </div>
        </div>
        <div class="login-img">
            <img src="{{asset('admin/assets/img/login.jpg')}}" alt="img">
        </div>
    </div>
</div>
@endsection