@section('title', 'Librify - Add Publisher')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Create Publisher') }}</span>
            <a href="{{ route('adminpublisher') }}"
                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-red-700 hover:bg-red-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Go Back</p>
            </a>
        </h2>
    </x-slot>
    <x-success-status class="mb-4 text-center" :status="session('message')" />
    <x-validation-error class="mb-4 text-center" :status="session('errors')" />
    <div class="container max-w-screen-lg mx-auto lg:mt-4">
        <div>
            <form action="{{ url('/publisher/create') }}" method="POST">
                @csrf
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Publisher</p>
                            <p>Input Name, City, and Year Publisher</p>
                        </div>
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="name" :value="__('Name')">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>

                                <div class="md:col-span-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>

                                <div class="md:col-span-2">
                                    <label for="year">Year</label>
                                    <input type="text" name="year" id="year"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button
                                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                            <p class="text-sm font-medium leading-none text-white">Save Publisher</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
