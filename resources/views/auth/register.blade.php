{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sign Up</title>
    <link rel="icon" href="{{ asset('assets/icon.svg') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="Night"
                    src="https://images.unsplash.com/photo-1580537659466-0a9bfa916a54?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="absolute inset-0 h-full w-full object-cover opacity-80" />
            </section>
            <main
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <div class="relative -mt-16 block lg:block">
                        <a class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-white text-blue-600 sm:h-20 sm:w-20"
                            href="/">
                            <span class="sr-only">Home</span>
                            <svg id="solid" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                class="rotate-12">
                                <title />
                                <path
                                    d="M407.951,343.116a7.2,7.2,0,0,1,.048.733c.121,13.4-15.891,29.5-41.725,41.981C345.344,395.944,309.222,408,256,408s-89.344-12.056-110.274-22.17C119.892,373.348,103.88,357.246,104,343.849a7.2,7.2,0,0,1,.048-.733L115.1,243.624a7,7,0,0,1,9.82-5.615L242.911,290.9a32.043,32.043,0,0,0,26.179,0l117.986-52.89a7,7,0,0,1,9.82,5.615ZM474.988,153.4l-205.9-92.3a32.037,32.037,0,0,0-26.179,0l-205.9,92.3a16,16,0,0,0,0,29.2l205.9,92.3a32.043,32.043,0,0,0,26.179,0L440,198.284v59.874A15.98,15.98,0,0,0,432,272V376h32V272a15.98,15.98,0,0,0-8-13.842V191.111l18.987-8.511a16,16,0,0,0,0-29.2Z"
                                    fill="#000000" />
                            </svg>
                        </a>

                        <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Welcome to Librify!
                        </h1>

                        <p class="mt-4 leading-relaxed text-gray-500 text-justify">
                            Join us and start your digital journey by creating a new account now! Discover extraordinary
                            experiences and utilize our services to help you achieve your goals.
                        </p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="mt-8 grid grid-cols-6 gap-6">
                        @csrf

                        <div class="col-span-6 ">
                            <label for="name" :value="__('Name')"
                                class="block text-sm font-medium text-gray-700 ">
                                Name
                            </label>
                            <input id="name" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="name"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <label for="email" :value="__('Email')"
                                class="block text-sm font-medium text-gray-700">
                                Email
                            </label>
                            <input type="email" id="email" name="email" type="email" :value="old('email')"
                                required autocomplete="username"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="password" :value="__('Password')"
                                class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <input type="password" id="password" name="password" required autocomplete="new-password"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="password_confirmation" :value="__('Confirm Password')"
                                class="block text-sm font-medium text-gray-700">
                                Password Confirmation
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                autocomplete="new-password"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit"
                                class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                Create an account
                            </button>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-gray-700 underline">Log in</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</body>

</html>
