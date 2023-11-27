@extends('frontend.app')
@section('title', 'Librify - Category')
@section('content')
    <div class="bg-[#faeee7] py-11">
        <div>
            <h2 class="font-bold text-center text-[#33272a] text-4xl">Category</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-7 md:gap-10 lg:gap-10 mt-10 mx-2 md:mx-16 lg:mx-36 mb-10">
            @forelse ($categories as $category)
                <a class="group relative inline-flex items-center overflow-hidden rounded bg-[#33272a] px-8 py-4 text-white focus:outline-none focus:ring active:bg-[#594a4e] h-20 md:h-32"
                    href="{{ url('/categories/' . $category->name . '/book') }}">
                    <span class="absolute -start-full transition-all group-hover:start-4">
                        <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>

                    <span class="text-sm font-medium transition-all md:text-lg group-hover:ms-4">
                        {{ $category->name }}
                    </span>

                </a>
            @empty
                <h2>No Categories Found</h2>
            @endforelse

        </div>
    </div>
@endsection
