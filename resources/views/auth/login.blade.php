<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <br>
        <div style="display: flex; justify-content: center; gap: 100px; align-items: center;">
    <a href="{{ route('social.redirect', 'google') }}" style="background-color: #DB4437; color: white; padding: 10px 15px; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; text-decoration: none;">
        <i class="fab fa-google" style="font-size: 24px;"></i>
    </a>

    <a href="{{ route('social.redirect', 'facebook') }}" style="background-color: #1877F2; color: white; padding: 10px 15px; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; text-decoration: none;">
        <i class="fab fa-facebook-f" style="font-size: 24px;"></i>
    </a>
</div>
<div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
<span><b>Login with Google</b></span> 
<span><b>Login with Facebook</b></span>
</div>

       


    </form>
</x-guest-layout>
