@section('title', 'Dashboard - Librify')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-5 gap-4 grid grid-cols-1 md:grid-cols-3 ">
                <div>
                    <article
                        class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                        <div class="rounded-[10px] bg-white p-4 !pt-5 sm:p-6">
                            <div class="flex items-center justify-center">
                                <svg height="200px" width="200px" version="1.1" id="_x32_"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" xml:space="preserve">
                                    <g>
                                        <path class="st0" d="M162.592,147.193c0,0,56.607,11.331,130.198-62.272c33.969,45.3,56.63,67.938,56.63,67.938v67.96
  c22.727-23.44,36.795-55.36,36.795-90.598C386.215,58.298,327.917,0,255.994,0c-71.9,0-130.198,58.298-130.198,130.221
  c0,35.238,14.046,67.157,36.795,90.598V147.193z" />
                                        <path class="st0" d="M343.32,297.426c-9.137,4.996-87.325,176.655-87.325,176.655s-78.176-171.658-87.326-176.655
  C80.654,329.18,76.724,400.311,76.724,512h358.552C435.276,400.311,431.347,329.18,343.32,297.426z" />
                                        <polygon class="st0"
                                            points="217.017,289.757 217.017,341.733 255.994,328.478 294.982,341.733 294.982,289.757 255.994,303.013
		" />
                                    </g>
                                </svg>
                            </div>
                            <a href="{{ url('/usertype') }}">
                                <h3 class="mt-5 text-2xl  font-bold text-gray-900">
                                    User
                                </h3>
                            </a>
                            <h1 class="text-3xl font-bold">{{ count($user) }}</h1>
                        </div>
                    </article>
                </div>
                <div>
                    <article
                        class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                        <div class="rounded-[10px] bg-white p-4 !pt-5 sm:p-6">
                            <div class="flex items-center justify-center">
                                <?xml version="1.0" encoding="utf-8"?>
                                <svg width="200px" height="200px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235"
                                        stroke="#1C274D" stroke-width="1.5" />
                                    <path d="M8 7H16" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M8 10.5H13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M10 22C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8M14 22C16.8284 22 18.2426 22 19.1213 21.1213C20 20.2426 20 18.8284 20 16V12"
                                        stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <a href="{{ url('/book') }}">
                                <h3 class="mt-5 text-2xl  font-bold text-gray-900">
                                    Books
                                </h3>
                            </a>
                            <h1 class="text-3xl font-bold">{{ count($book) }}</h1>
                        </div>
                    </article>
                </div>
                <div>
                    <article
                        class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                        <div class="rounded-[10px] bg-white p-4 !pt-5 sm:p-6">
                            <div class="flex items-center justify-center">
                                <?xml version="1.0" encoding="utf-8"?>
                                <svg width="200px" height="200px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.24 2H5.34C3.15 2 2 3.15 2 5.33V7.23C2 9.41 3.15 10.56 5.33 10.56H7.23C9.41 10.56 10.56 9.41 10.56 7.23V5.33C10.57 3.15 9.42 2 7.24 2Z"
                                        fill="#292D32" />
                                    <path opacity="0.4"
                                        d="M18.6695 2H16.7695C14.5895 2 13.4395 3.15 13.4395 5.33V7.23C13.4395 9.41 14.5895 10.56 16.7695 10.56H18.6695C20.8495 10.56 21.9995 9.41 21.9995 7.23V5.33C21.9995 3.15 20.8495 2 18.6695 2Z"
                                        fill="#292D32" />
                                    <path
                                        d="M18.6695 13.4302H16.7695C14.5895 13.4302 13.4395 14.5802 13.4395 16.7602V18.6602C13.4395 20.8402 14.5895 21.9902 16.7695 21.9902H18.6695C20.8495 21.9902 21.9995 20.8402 21.9995 18.6602V16.7602C21.9995 14.5802 20.8495 13.4302 18.6695 13.4302Z"
                                        fill="#292D32" />
                                    <path opacity="0.4"
                                        d="M7.24 13.4302H5.34C3.15 13.4302 2 14.5802 2 16.7602V18.6602C2 20.8502 3.15 22.0002 5.33 22.0002H7.23C9.41 22.0002 10.56 20.8502 10.56 18.6702V16.7702C10.57 14.5802 9.42 13.4302 7.24 13.4302Z"
                                        fill="#292D32" />
                                </svg>
                            </div>
                            <a href="{{ url('/category') }}">
                                <h3 class="mt-5 text-2xl  font-bold text-gray-900">
                                    Category
                                </h3>
                            </a>
                            <h1 class="text-3xl font-bold">{{ count($category) }}</h1>
                        </div>
                    </article>
                </div>
                <div>
                    <article
                        class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                        <div class="rounded-[10px] bg-white p-4 !pt-5 sm:p-6">
                            <div class="flex items-center justify-center">
                                <?xml version="1.0" encoding="utf-8"?>
                                <?xml version="1.0" encoding="utf-8"?>
                                <svg fill="#000000" width="200px" height="200px" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.967 8.193L5 13h3v6h4v-6h3L9.967 8.193zM18 1H2C.9 1 0 1.9 0 3v12c0 1.1.9 2 2 2h4v-2H2V6h16v9h-4v2h4c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zM2.5 4.25a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5zm2 0a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5zM18 4H6V3h12.019L18 4z" />
                                </svg>
                            </div>
                            <a href="{{ url('/publisher') }}">
                                <h3 class="mt-5 text-2xl  font-bold text-gray-900">
                                    Publisher
                                </h3>
                            </a>
                            <h1 class="text-3xl font-bold">{{ count($publisher) }}</h1>
                        </div>
                    </article>
                </div>

                <div>
                    <article
                        class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                        <div class="rounded-[10px] bg-white p-4 !pt-5 sm:p-6">
                            <div class="flex items-center justify-center">
                                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg width="200px" height="200px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.5 21H4C4 17.134 7.13401 14 11 14C11.1681 14 11.3348 14.0059 11.5 14.0176M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <a href="{{ url('/userReview') }}">
                                <h3 class="mt-5 text-2xl  font-bold text-gray-900">
                                    User Review
                                </h3>
                            </a>
                            <h1 class="text-3xl font-bold">{{ count($review) }}</h1>
                        </div>
                    </article>
                </div>
            </div>
        </div>
</x-app-layout>
