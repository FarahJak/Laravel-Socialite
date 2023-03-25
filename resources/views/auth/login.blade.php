<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <br>
        <hr>
        <br>
        <h2 class="flex items-center justify-center">Log in With</h2>

        <div class="flex items-center justify-center mt-4">
            <a href="/auth/github/redirect">
                <x-button class="ml-3">
                    {{ __('Log in with GitHub') }}
                </x-button>
            </a>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a href="/auth/google/redirect">
                <x-button class="ml-3">
                    {{ __('Log in with Google') }}
                </x-button>
            </a>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a href="/auth/linkedin/redirect">
                <x-button class="ml-3">
                    {{ __('Log in with Linkedin') }}
                </x-button>
            </a>
        </div>
        {{-- <div class="flex items-center justify-center mt-4">
            <a href="/auth/facebook/redirect">
                <x-button class="ml-3">
                    <span style="margin-right: 10px">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                            xmlns="http://www.w3.org/2000/svg">
                            <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                            <path
                                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                        </svg>
                    </span>
                    {{ __('Log in with Facebook') }}
                </x-button>
            </a>
        </div> --}}
    </x-auth-card>
</x-guest-layout>
