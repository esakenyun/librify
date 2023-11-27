@extends('frontend.app')
@section('title', 'Librify - ' . $books->title)
@section('content')
    <div class="bg-[#faeee7]">

        @if ($books)
            <div class="pt-5 md:pt-20">
                <div class="py-3 mx-4 border-2 border-[#5f6c7b] bg-slate-50 rounded-md md:mx-20 lg:mx-60">
                    <div>
                        <h2 class="text-center font-bold mb-3 text-xl md:text-2xl">{{ $books->title }}</h2>
                    </div>
                    <p class="mx-3 mb-2 text-sm md:mx-0 md:ml-5"><a href="{{ url('/') }}"
                            class="text-blue-500 hover:text-blue-300">Home /
                        </a> <a href="{{ url('/books') }}" class="text-blue-500 hover:text-blue-300" hover>Book / </a> <span
                            class="text-gray-500">Detail</span></p>

                    <div class="grid grid-cols 1 md:grid-cols-2">
                        <div class="ml-2 mr-2 md:mr-5 lg:mr-0 md:ml-5">
                            <img src="{{ asset('storage/' . $books->image) }}" alt="" class="lg:w-10/12">
                        </div>
                        <div x-data="{ showFullText: window.innerWidth >= 1024 }" class="ml-3 mt-5 mr-3 md:mt-0 md:mr-0 md:ml-0">
                            <h2 class="text-xl font-extrabold inline-block bg-rose-400 rounded-sm text-white">
                                &nbsp;Abstract&ensp;
                            </h2>
                            <p x-show="!showFullText" class="mt-3 text-justify md:mr-5">
                                {{ Str::words($books->abstract, 50) }}
                            </p>
                            <p x-show="showFullText" class="mt-3 text-justify md:mr-5">
                                {{ $books->abstract }}
                            </p>
                            <button x-show="!showFullText" @click="showFullText = true"
                                class="text-blue-800 hover:underline cursor-pointer">
                                {{ 'Read More' }}
                            </button>
                        </div>

                    </div>

                    <div class="mt-5 mx-3 grid grid-cols-1 md:grid-cols-2">
                        <div class="md:mx-2">
                            <h2 class="text-xl font-extrabold inline-block bg-green-500 rounded-sm text-white">
                                &nbsp;Author&ensp;</h2>
                            <p>Name : {{ $books->author }}</p>
                        </div>
                        <div class="mt-5 md:mx-2 md:mt-0">
                            <h2 class="text-xl font-extrabold inline-block bg-yellow-500 rounded-sm text-white">
                                &nbsp; Publisher&ensp;</h2>
                            @if ($books->publisher)
                                <p>Name : {{ $books->publisher->name }}</p>
                                <p>City : {{ $books->publisher->city }}</p>
                                <p>Year : {{ $books->publisher->year }}</p>
                            @else
                                <p>Publisher not available</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-5 md:mt-14">
                        <h6 class="mx-3 md:ml-5"><a href="{{ url('/books/view/' . $bookfile->id) }}"
                                class="text-blue-500
                                hover:text-blue-300 focus:underline focus:underline-offset-1 active:underline
                                active:underline-offset-1 focus-visible:outline-none">
                                View
                            </a>

                            and <a href="{{ url('/books/download/' . $bookfile->id) }}"
                                class="text-blue-500 hover:text-blue-300 focus:underline focus:underline-offset-1 active:underline active:underline-offset-1 focus-visible:outline-none">Download</a>
                        </h6>
                    </div>
                </div>

            </div>
        @else
            <h2>Book Not Found</h2>
        @endif

        <div class="pt-5 pb-10">
            <div class="py-3 mx-4 border-2 border-[#5f6c7b] bg-white rounded-md md:mx-20 lg:mx-60">
                <div class="mx-3 lg:mx-5">
                    <h1 class="font-extrabold text-xl mb-2 text-center md:text-2xl">Your opinion matters to us!</h1>
                    <form action="{{ url('/postReview') }}" method="post">
                        @csrf
                        <div class="bg-[#ff8ba7] rounded-md pb-2 md:mx-5">
                            <div class="mb-4 pt-2">
                                <div>
                                    <h1 class="text-center md:text-lg">How was your experience?</h1>
                                </div>
                                <div x-data="{ rating: {{ $books->rating ?? 0 }} }" class="mb-4 flex justify-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="rating{{ $i }}" name="rating"
                                            value="{{ $i }}" x-model="rating"
                                            x-bind:checked="rating === {{ $i }}" hidden class="hidden">
                                        <label for="rating{{ $i }}" class="cursor-pointer text-3xl md:text-4xl"
                                            :class="{
                                                'text-amber-400': {{ $i }} <=
                                                    rating,
                                                'text-gray-300': {{ $i }} > rating
                                            }">&#9733;</label>
                                    @endfor

                                    <input x-model="rating" type="hidden" name="rating" required>
                                    <input type="hidden" name="book_id" value="{{ $books->id }}">
                                </div>

                            </div>
                            <div class="mb-4 mx-5 md:mx-14">
                                <textarea name="review" id="review" rows="4" class="mt-1 p-2 border rounded-md w-full"
                                    placeholder="Leave a message, if you want"></textarea>
                            </div>

                            <div class="mb-4 mx-5 md:mx-14">
                                <button type="submit"
                                    class="focus:ring-2 text-white font-bold focus:ring-offset-2 focus:ring-[] inline-flex items-center justify-center px-6 py-3 hover:scale-105 bg-[#33272a] hover:bg-[#594a4e] focus:outline-none rounded">Rate
                                    Now</button>
                            </div>
                        </div>
                    </form>
                </div>

                <br>
                <hr class="h-px mx-3 bg-gray-700 border-0 md:mx-12">

                <div>
                    <h2 class="mx-3 mt-5 font-bold text-lg md:mx-12 md:text-2xl">Rating & Review</h2>
                </div>

                @forelse ($ratings as $rating)
                    <div class="mt-5 mx-3 md:mx-12">
                        <div class="flex gap-4 items-center">
                            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" class="w-10 md:w-16 ">
                                <circle cx="8" cy="8" r="8" />
                                <text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="white" font-size="10"
                                    class="font-bold">
                                    {{ strtoupper(substr($rating->user->name, 0, 2)) }}
                                </text>
                            </svg>
                            <div>
                                <p>Name: {{ $rating->user->name }}</p>
                                <div x-data="{ rating: {{ $rating->rating ?? 0 }} }" class="mb-4 flex justify-center">
                                    @for ($n = 1; $n <= 5; $n++)
                                        <label for="rating{{ $i }}" class="cursor-pointer text-3xl md:text-4xl"
                                            :class="{
                                                'text-amber-400': {{ $n }} <= rating,
                                                'text-gray-300': {{ $n }} > rating
                                            }"
                                            readonly>&#9733;</label>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="mx-1 md:mx-2 mt-5">
                            @if ($rating->review)
                                <textarea name="review" id="review" rows="4" class="mt-1 p-2 border rounded-md w-full" readonly>{{ $rating->review }}</textarea>
                            @else
                            @endif
                        </div>
                    </div>
                    <hr class="h-px mx-3 bg-gray-900 border-0 mt-5 md:mx-12">
                @empty
                    <h2 class="font-semibold m-5 mx-3 md:mx-12">No Rating & Review Found</h2>
                    <hr class="h-px mx-3 bg-gray-900 border-0 mt-5 md:mx-12">
                @endforelse

                <div class="mx- mt-2 ">
                    {{ $ratings->onEachSide(2)->links() }}
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="py-3 mx-4 border-2 border-gray-400 bg-white rounded-md md:mx-28 lg:mx-48">
                <div>
                    <h2 class="text-center font-bold mb-3 text-xl">TITLE</h2>
                </div>
                <p class="mx-3 mb-2 text-sm md:mx-0 md:ml-5"><a href="{{ url('/') }}"
                        class="text-blue-500 hover:text-blue-300">Home /
                    </a> <a href="{{ url('/books') }}" class="text-blue-500 hover:text-blue-300" hover>Book / </a> <span
                        class="text-gray-500">Detail</span></p>
                <div class="grid rows-4">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="mx-2 md:ml-5 md:mx-0">
                            <img src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                                alt="" class="md:w-2/3 lg:w-3/4">
                        </div>
                        <div class=" mt-5 md:mt-0 md:mr-10">
                            <h2 class="mx-3">Abstrak</h2>
                            <p class="text-justify mx-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                                voluptatibus quam deleniti
                                dicta quae alias dolorum vero. Quae ut sit inventore aspernatur, ipsam consequatur ipsa,
                                ratione praesentium corporis iste maiores.</p>
                        </div>
                    </div>

                    <div class="mt-5 mx-3 grid grid-cols-1 md:grid-cols-2">
                        <div class="md:mx-2">
                            <h2 class="text-xl font-bold inline-block bg-rose-400 rounded-sm"><ion-icon
                                    name="pencil-outline" class="mr-2 text-white"></ion-icon>Pengarang</h2>
                            <p>Nama : Udin</p>
                        </div>
                        <div class="mt-5 md:mx-2 md:mt-0">
                            <h2 class="text-xl font-bold inline-block bg-rose-400 rounded-sm">Publisher</h2>
                            <p>Nama : Gramedia</p>
                            <p>City : New York</p>
                            <p>Year : 2020</p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-14">
                        <h2 class="mx-3 md:ml-5">View And Download</h2>
                        <a class="mx-3 md:ml-5">click here</a>
                    </div>
                </div>
            </div> --}}
    </div>
@endsection
