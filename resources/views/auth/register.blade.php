<x-guest-layout>

    <div class="w-full max-w-md p-8 space-y-6  rounded-lg ">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">Create an Account</h2>
            <p class="text-sm text-gray-500">Register to get started</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <x-primary-button
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Register
            </x-primary-button>
        </form>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">OR</span>
            </div>
        </div>

        <!-- Google Login -->
        <a href="{{ route('google.redirect') }}"
            class="flex items-center justify-center w-full px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 488 512">
                <path
                    d="M488 261.8c0-17.8-1.6-35.2-4.6-52H250v98.4h134.2c-5.8 31.4-23.2 57.8-49.2 75.6v62h79.4c46.4-42.8 73.6-105.8 73.6-184zM250 500c67.2 0 123.4-22.4 164.6-60.6l-79.4-62c-22.2 15-50.4 24-85.2 24-65.6 0-121-44.2-140.8-103.4H25.2v64.8C66.4 453.4 153.4 500 250 500zM109.2 312.6c-5.2-15.4-8.2-31.8-8.2-48.6s3-33.2 8.2-48.6v-64.8H25.2C9 186.2 0 217.8 0 250s9 63.8 25.2 99.4l84-64.8zM250 100c34.8 0 63 12.2 85.2 32.2l63.8-63.8C373.4 32.4 317.2 10 250 10 153.4 10 66.4 56.6 25.2 148.6l84 64.8C129 144.2 184.4 100 250 100z" />
            </svg>
            Login with Google
        </a>

        <!-- Login Link -->
        <p class="text-sm text-center text-gray-500">Already have an account? <a href="{{ route('login') }}"
                class="text-indigo-600 hover:underline">Login</a></p>
    </div>

</x-guest-layout>
