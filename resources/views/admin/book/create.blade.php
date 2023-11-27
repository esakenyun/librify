@section('title', 'Librify - Add Book')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Add Book') }}</span>
            <a href="{{ route('adminbooks') }}"
                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-red-700 hover:bg-red-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Go Back</p>
            </a>
        </h2>
    </x-slot>
    <x-success-status class="mb-4 text-center" :status="session('message')" />
    <x-validation-error class="mb-4 text-center" :status="session('errors')" />
    <div x-data="{ openTab: 1 }" class="p-8 ">
        <div class="max-w-6xl mx-auto">
            <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Home
                </button>
                <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Description
                </button>
                <button x-on:click="openTab = 3" :class="{ 'bg-blue-600 text-white': openTab === 3 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Status
                </button>
            </div>

            <form action="{{ url('/book/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div x-show="openTab === 1"
                    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Book</p>
                                <p>Input Title and Image Book</p>
                            </div>
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="category_id" :value="__('Category')">Category</label>
                                        <select name="category_id" id="category_id"
                                            class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="title" :value="__('Title')">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            :value="old('title')" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="author" :value="__('Title')">Author</label>
                                        <input type="text" name="author" id="author"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            :value="old('author')" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="publisher_id" :value="__('Publisher')">Publisher</label>
                                        <select name="publisher_id" id="publisher_id"
                                            class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">
                                            <option value="">Select Publisher</option>
                                            @foreach ($publishers as $publisher)
                                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="image" :value="__('Image')">Image</label>
                                        <input type="file" name="image" id="image"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="openTab === 2"
                    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Book</p>
                                <p>Input Small Description and Abstract Book</p>
                            </div>
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="small_description" :value="__('Small Description')">Small
                                            Description</label>
                                        <textarea name="small_description" id="small_description" class="border mt-1 rounded px-4 w-full bg-gray-50"
                                            rows="4" :value="old('small_description')"></textarea>
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="abstract" :value="__('Abstract')">Abstract</label>
                                        <textarea name="abstract" id="abstract" class="border mt-1 rounded px-4 w-full bg-gray-50" rows="15"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="openTab === 3"
                    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Book</p>
                                <p>Set Trending and Status Book</p>
                            </div>
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-2 flex items-center">
                                        <label for="trending" :value="__('Trending')">Trending</label>
                                        <input type="checkbox" name="trending" id="trending"
                                            class="h-5 w-5 ml-2 border rounded bg-gray-50" :value="old('trending')" />
                                    </div>

                                    <div class="md:col-span-2 flex items-center">
                                        <label for="status" :value="__('Status')">Status</label>
                                        <input type="checkbox" name="status" id="status"
                                            class="h-5 w-5 ml-2 border rounded bg-gray-50" :value="old('status')" />
                                    </div>

                                    <div class="md:col-span-1 text-right">
                                        <div class="inline-flex items-end">
                                            <button
                                                class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                                <p class="text-sm font-medium leading-none text-white">Save Book</p>
                                            </button>
                                        </div>
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
