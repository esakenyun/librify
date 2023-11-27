@section('title', 'Admin Books')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('Books') }}</span>
            <a href="{{ route('book.create') }}"
                class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white">Add Book</p>
            </a>
        </h2>
    </x-slot>

    <div class="py-10">
        <x-success-status class="mb-4 text-center" :status="session('message')" />
        <div class="container flex justify-center mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="border-b border-gray-200 shadow">
                        <table class="divide-y divide-gray-300 ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        ID
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Title
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Author
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Image
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Small Description
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Abstract
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Trending
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Status
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Category
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Publisher
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Edit
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                                @forelse ($books as $book)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal text-center">
                                            {{ $book->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 whitespace-normal text-center">
                                                {{ $book->title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal text-center">

                                            {{ $book->author }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal text-center">
                                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                                                width="100" height="100">
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal text-center">
                                            {{ implode(' ', array_slice(str_word_count($book->small_description, 1), 0, 10)) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-500 max-w-xl whitespace-normal text-center">
                                            {{ implode(' ', array_slice(str_word_count($book->abstract, 1), 0, 15)) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            {{ $book->trending }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            {{ $book->status }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            {{ optional($book->category)->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal text-center">
                                            {{ optional($book->publisher)->name }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ url('/edit-book/' . $book->id) }}"
                                                class="px-4 py-1 text-sm inline-flex focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:scale-105  hover:bg-indigo-300 text-blue-600 bg-blue-200 rounded-full ">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form action="{{ url('delete-book/' . $book->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-4 py-1 text-sm inline-flex focus:ring-2 focus:ring-offset-2 focus:ring-red-600 hover:scale-105 hover:bg-red-300  text-red-400 bg-red-200 rounded-full">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
