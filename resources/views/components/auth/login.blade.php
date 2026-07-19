<x-guest-layout title="Welcome back!" subtitle="Sign in to your account to continue">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-floating-input id="email" name="email" type="email" label="Email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-floating-input id="password" name="password" type="password" label="Password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between w-full my-4">
            <!-- Remember Me -->
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="w-full">
            <x-primary-button class="w-full justify-center py-2">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="flex items-center justify-center mt-6">
        @if (Route::has('password.request'))
            <p class="text-sm text-gray-600 mr-2">
                {{ __('New User?') }}
            </p>
            <a class="underline text-sm text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                href="{{ route('register') }}">
                {{ __('Register Here') }}
            </a>
        @endif
    </div>
    <div class="mt-6 flex items-center justify-between">
        <span class="w-1/5 border-b border-gray-300 lg:w-1/4"></span>
        <span class="text-xs text-center text-gray-500 capitalize">or continue with</span>
        <span class="w-1/5 border-b border-gray-300 lg:w-1/4"></span>
    </div>

    <div class="mt-4">
        <a href="{{ route('socialite.redirect', 'github') }}"
            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-[#24292e] rounded-md hover:bg-[#1b1f23] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z">
                </path>
            </svg>
            GitHub
        </a>
    </div>


</x-guest-layout>
