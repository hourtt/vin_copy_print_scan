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
</x-guest-layout>
