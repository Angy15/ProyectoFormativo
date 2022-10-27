@extends('layouts.login')

@section('content')
<div class="container">
    <div class="content">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo position-absolute top-3 start-50 translate-middle mt-1">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>

                <label for="email" class="mx-4" :value="__('Email')">Email:</label>
                <br>
                <input id="email" class="block mt-1 mx-4 w-full" type="email" name="email" :value="old('email')" required autofocus>
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="mx-4" :value="__('Password')">Contraseña:</label>
                <br>
                <input id="password" class="block mt-1 mx-4 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4 mx-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="mt-4">
                ¿No esta resgistrado?
                <a  class="underine text-sm text-gray-600 hover:text-gray-900" href="{{ route('register')}}">
                    {{__('¡Resgistrese!')}}
                </a>
            </div>
    
            <div class="flex items-center justify-end mt-4 mx-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                <button class="btn btn-warning">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

    </div>
    
</div>

@endsection
    
    