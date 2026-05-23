<x-guest-layout title="Create an account" subtitle="Sign up to start explore and ordering our printing services">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Row 1: First Name & Last Name --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                    required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                    required autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        {{-- Row 2: Email (full width) --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Row 3: Password & Confirm Password --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-password-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-password-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
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
                {{ __('Already registered?') }}
                <a class="underline hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                    href="{{ route('login') }}">
                    {{ __('Sign in') }}
                </a>
            </div>
        @endif

    </form>
</x-guest-layout>
