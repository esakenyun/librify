<header class="bg-[#ff8ba7]">
    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/librify.svg') }}" alt="logo" class="hidden md:block">
                <img src="{{ asset('assets/logo.svg') }}" alt="logo" class="w-14 md:hidden lg:hidden">
            </a>
            <!-- Dalam file Blade yang sesuai, mungkin di dalam file header.blade.php -->
            <form action="{{ route('search.result') }}" method="GET">
                <div class="relative">
                    <label class="sr-only" for="search">Search</label>
                    <input
                        class="h-10 w-40 rounded-lg border-none bg-white pe-10 ps-4 text-sm  shadow-sm sm:w-56 md:w-[20rem] lg:w-[30rem] md:ml-[4rem] lg:ml-[12rem]"
                        id="search" type="search" name="query" placeholder="Search Books..." />
                    <button type="submit"
                        class="absolute end-1 top-1/2 -translate-y-1/2 rounded-md  p-2 text-gray-600 transition hover:text-gray-700">
                        <span class="sr-only">Search</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>

            <div class="flex flex-1 items-center justify-between gap-1 sm:justify-end">
                <div class="flex gap-2 lg:gap-4">
                    <a href="{{ url('/books') }}"
                        class="shrink-0 ml-2 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700 lg:hidden">
                        <span class="sr-only">Books</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path
                                d="M4 19V6.2C4 5.0799 4 4.51984 4.21799 4.09202C4.40973 3.71569 4.71569 3.40973 5.09202 3.21799C5.51984 3 6.0799 3 7.2 3H16.8C17.9201 3 18.4802 3 18.908 3.21799C19.2843 3.40973 19.5903 3.71569 19.782 4.09202C20 4.51984 20 5.0799 20 6.2V17H6C4.89543 17 4 17.8954 4 19ZM4 19C4 20.1046 4.89543 21 6 21H20M9 7H15M9 11H15M19 17V21" />
                        </svg>
                    </a>
                    <a href="{{ url('/categories') }}"
                        class="shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700 lg:hidden">
                        <span class="sr-only">Category</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z" />
                            <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z" />
                            <path id="Stroke 5" fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z" />
                            <path id="Stroke 7" fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z" />
                        </svg>
                    </a>
                    @guest
                        <div>
                            <a href="#" id="authToggle"
                                class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700 lg:hidden">
                                <span class="sr-only">Auth</span>
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>

                            <div id="authDropdown" style="display: none;"
                                class="absolute z-40 mt-2 w-36 bg-white rounded-md border right-10 md:right-5 lg:right-40">
                                <x-responsive-nav-link href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </x-responsive-nav-link>

                                <x-responsive-nav-link href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </x-responsive-nav-link>
                            </div>
                        </div>

                        <script>
                            document.getElementById('authToggle').addEventListener('click', function() {
                                var authDropdown = document.getElementById('authDropdown');
                                authDropdown.style.display = (authDropdown.style.display === 'none' || authDropdown.style.display ===
                                    '') ? 'block' : 'none';
                            });

                            window.addEventListener('click', function(event) {
                                var authDropdown = document.getElementById('authDropdown');
                                var authToggle = document.getElementById('authToggle');

                                if (authDropdown.style.display === 'block' && event.target !== authToggle && !authToggle.contains(event
                                        .target)) {
                                    authDropdown.style.display = 'none';
                                }
                            });
                        </script>

                    @endguest

                    @auth
                        <div>
                            <a href="#" id="authToggle"
                                class="block shrink-0 rounded-lg bg-white p-2.5 text-gray-600 shadow-sm hover:text-gray-700 lg:hidden">
                                <span class="sr-only">Auth</span>
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>

                            <div id="authDropdown" style="display: none;"
                                class="absolute z-40 mt-2 w-36 bg-white rounded-md border right-10 md:right-5 lg:right-40">
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>

                        <script>
                            function toggleAuthDropdown() {
                                var authDropdown = document.getElementById('authDropdown');
                                authDropdown.style.display = (authDropdown.style.display === 'none' || authDropdown.style.display === '') ?
                                    'block' : 'none';
                            }

                            function submitLogout() {
                                document.getElementById('authDropdown').style.display = 'none';
                                document.forms[0].submit();
                            }

                            document.getElementById('authToggle').addEventListener('click', toggleAuthDropdown);

                            window.addEventListener('click', function(event) {
                                var authDropdown = document.getElementById('authDropdown');
                                var authToggle = document.getElementById('authToggle');

                                if (authDropdown.style.display === 'block' && event.target !== authToggle && !authToggle.contains(event
                                        .target)) {
                                    authDropdown.style.display = 'none';
                                }
                            });
                        </script>
                    @endauth
                    <a href="{{ url('/books') }}"
                        class="shrink-0 rounded-lg bg-white p-2.5 text-gray-500 shadow-sm hover:text-gray-700 mr-3 hidden lg:block">
                        <span class="font-bold text-sm">Books</span>
                    </a>
                    <a href="{{ url('/categories') }}"
                        class="shrink-0 rounded-lg bg-white p-2.5 text-gray-500 shadow-sm hover:text-gray-700 mr-7 hidden lg:block">
                        <span class="font-bold text-sm">Category</span>
                    </a>
                    @guest
                        <a href="{{ route('login') }}"
                            class="shrink-0 rounded-lg bg-[#33272a] p-2.5 text-white shadow-sm hover:text-gray-300  hidden lg:block">
                            <span class="font-bold text-sm">Login</span>
                        </a>
                        <a href="{{ route('register') }}"
                            class="shrink-0 rounded-lg bg-[#33272a] p-2.5 text-white shadow-sm hover:text-gray-300 hidden lg:block">
                            <span class="font-bold text-sm">Register</span>
                        </a>
                    @endguest
                </div>
                @auth
                    <div id="authLGToggle" class="hidden lg:block">
                        <!-- Button Trigger -->
                        <button type="button" class="group flex items-center rounded-lg transition focus:outline-none"
                            @click="open = !open">
                            <span class="sr-only">Menu</span>
                            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1"
                                viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="w-11 hidden lg:block">
                                <circle cx="8" cy="8" r="8" fill="#" />
                                <text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="white" font-size="8"
                                    class="font-extralight">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </text>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="ms-4 hidden h-5 w-5 text-gray-500 transition group-hover:text-gray-700 sm:block"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d=" M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->

                        {{-- <div id="authDropdown" style="display: none;"
                            class="absolute z-40 mt-2 w-36 bg-white rounded-md border right-3 md:right-5 lg:right-40">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link href="{{ route('logout') }}" onclick="submitLogout()">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div> --}}
                        <div id="authLGDropdown" style="display: none;"
                            class="absolute z-50 mt-2 w-36 bg-white rounded-md border right-3 md:right-5 lg:right-40 ">
                            {{-- <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link> --}}
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>


                    </div>
                    <script>
                        function toggleAuthDropdown() {
                            var authDropdown = document.getElementById('authLGDropdown');
                            authDropdown.style.display = (authDropdown.style.display === 'none' || authDropdown.style.display === '') ?
                                'block' : 'none';
                        }

                        function submitLogout() {
                            document.getElementById('authLGDropdown').style.display = 'none';
                            document.forms[0].submit();
                        }

                        document.getElementById('authLGToggle').addEventListener('click', toggleAuthDropdown);

                        window.addEventListener('click', function(event) {
                            var authDropdown = document.getElementById('authLGDropdown');
                            var authToggle = document.getElementById('authLGToggle');

                            if (authDropdown.style.display === 'block' && event.target !== authToggle && !authToggle.contains(event
                                    .target)) {
                                authDropdown.style.display = 'none';
                            }
                        });
                    </script>
                @endauth

            </div>
        </div>
    </div>
</header>
