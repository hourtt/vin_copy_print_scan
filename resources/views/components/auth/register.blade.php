<x-guest-layout title="Create an account" subtitle="Sign up to start explore and ordering our printing services">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Row 1: First Name & Last Name --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-floating-input id="first_name" name="first_name" type="text" label="First Name" :value="old('first_name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-floating-input id="last_name" name="last_name" type="text" label="Last Name" :value="old('last_name')"
                    required autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        {{-- Row 2: Email (full width) --}}
        <div class="mt-4">
            <x-floating-input id="email" name="email" type="email" label="Email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Row 3: Password & Confirm Password --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
                <x-floating-input id="password" name="password" type="password" label="Password" required
                    autocomplete="new-password" />
            </div>

            <div>
                <x-floating-input id="password_confirmation" name="password_confirmation" type="password"
                    label="Confirm Password" required autocomplete="new-password" />
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        {{-- Row 4: Remember Me --}}
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        {{-- Row 5: Register button --}}
        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        {{-- Row 6: Already registered link --}}
        @if (Route::has('login'))
            <div class="mt-4 text-center text-sm text-gray-600">
                {{ __('Already Registered?') }}
                <a class="underline hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                    href="{{ route('login') }}">
                    {{ __('Sign In') }}
                </a>
            </div>
        @endif

    </form>

    <div class="mt-6 flex items-center justify-between">
        <span class="w-1/5 border-b border-gray-300 lg:w-1/4"></span>
        <span class="text-xs text-center text-gray-500 capitalize">or continue with</span>
        <span class="w-1/5 border-b border-gray-300 lg:w-1/4"></span>
    </div>

    <div class="mt-4">
        <a href="{{ route('socialite.redirect', 'github') }}" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-[#24292e] rounded-md hover:bg-[#1b1f23] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
            </svg>
            GitHub
        </a>
    </div>
</x-guest-layout>
