@section('title', 'Admin Review Book')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            <span>{{ __('User Review') }}</span>

        </h2>
    </x-slot>

    <div class="py-12">
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
                                        User
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Ratings
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Reviews
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Book
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
                                @forelse ($ratings as $rating)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            {{ $rating->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 text-center">
                                                {{ optional($rating->user)->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            {{ $rating->rating }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal text-center">
                                            {{ implode(' ', array_slice(str_word_count($rating->review, 1), 0, 10)) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                                            {{ optional($rating->book)->title }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ url('/edit-review/' . $rating->id) }}"
                                                class="px-4 py-1 text-sm inline-flex focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:scale-105  hover:bg-indigo-300 text-blue-600 bg-blue-200 rounded-full ">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form action="{{ url('delete-review/' . $rating->id) }}" method="POST">
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
