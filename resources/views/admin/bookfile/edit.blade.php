@section('title', 'Librify - Edit File Book')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Create Book File') }}</span>
            <a href="{{ route('adminbookfile') }}"
                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-red-700 hover:bg-red-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Go Back</p>
            </a>
        </h2>
    </x-slot>
    <x-success-status class="mb-4 text-center" :status="session('message')" />
    <x-validation-error class="mb-4 text-center" :status="session('errors')" />
    <div class="container max-w-screen-lg mx-auto lg:mt-4">
        <div>
            <form action="{{ url('update-bookfile/' . $bookfile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Book File</p>
                            <p>Input Book Name and File</p>
                        </div>
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="name" :value="__('Name')">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $bookfile->name }}" />
                                </div>
                                <div class="md:col-span-5">
                                    <label for="book_id" :value="__('Book id')">Book</label>
                                    <select name="book_id" id="book_id"
                                        class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">
                                        <option value="">Select Book</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}"
                                                {{ $book->id == $bookfile->book_id ? 'selected' : '' }}>
                                                {{ $book->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:col-span-5">
                                    <label for="bookfile" :value="__('bookfile')">Book File</label>
                                    <input type="file" name="bookfile" id="bookfile"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button
                                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                            <p class="text-sm font-medium leading-none text-white">Update Book File</p>
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
