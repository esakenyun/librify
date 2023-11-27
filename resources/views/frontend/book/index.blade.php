@extends('frontend.app')
@section('title', 'Librify - Books')
@section('content')
    <div class="bg-[#faeee7] py-11">
        <div>
            <h2 class="font-bold text-center text-[#33272a] text-4xl">Books</h2>
        </div>

        <div class="py-6 mx-5 gap-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-10 lg:mx-40 ">
            @forelse ($books as $book)
                <div class="border-2 border-[#33272a] lg:w-64 lg:border-4">
                    <a href="{{ url('/books/detail/' . $book->id) }}" class="group relative block bg-black">
                        <img alt="Developer" src="{{ asset('storage/' . $book->image) }}"
                            class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                        <div class="relative p-4 sm:p-6 lg:p-8">
                            <div class="mt-32 sm:mt-48 lg:mt-64">
                                <div
                                    class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                    <p class="text-sm text-white">
                                        {{ implode(' ', array_slice(str_word_count($book->small_description, 1), 0, 10)) . '....' }}
                                        <br>
                                        Read More
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <h2>No Books Found</h2>
            @endforelse
            {{-- <div class="border-2 border-amber-600  lg:w-64 lg:border-4">
            <a href="#" class="group relative block bg-black">
                <img alt="Developer"
                    src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                <div class="relative p-4 sm:p-6 lg:p-8">
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                        <div
                            class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis
                                perferendis hic asperiores quibusdam quidem voluptates doloremque
                                reiciendis nostrum harum. Repudiandae?
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="border-2 border-amber-600  lg:w-64 lg:border-4">
            <a href="#" class="group relative block bg-black">
                <img alt="Developer"
                    src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                <div class="relative p-4 sm:p-6 lg:p-8">
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                        <div
                            class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis
                                perferendis hic asperiores quibusdam quidem voluptates doloremque
                                reiciendis nostrum harum. Repudiandae?
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="border-2 border-amber-600  lg:w-64 lg:border-4">
            <a href="#" class="group relative block bg-black">
                <img alt="Developer"
                    src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                <div class="relative p-4 sm:p-6 lg:p-8">
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                        <div
                            class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis
                                perferendis hic asperiores quibusdam quidem voluptates doloremque
                                reiciendis nostrum harum. Repudiandae?
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="border-2 border-amber-600  lg:w-64 lg:border-4">
            <a href="#" class="group relative block bg-black">
                <img alt="Developer"
                    src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                <div class="relative p-4 sm:p-6 lg:p-8">
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                        <div
                            class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis
                                perferendis hic asperiores quibusdam quidem voluptates doloremque
                                reiciendis nostrum harum. Repudiandae?
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="border-2 border-amber-600  lg:w-64 lg:border-4">
            <a href="#" class="group relative block bg-black">
                <img alt="Developer"
                    src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                <div class="relative p-4 sm:p-6 lg:p-8">
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                        <div
                            class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis
                                perferendis hic asperiores quibusdam quidem voluptates doloremque
                                reiciendis nostrum harum. Repudiandae?
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="border-2 border-amber-600  lg:w-64 lg:border-4">
            <a href="#" class="group relative block bg-black">
                <img alt="Developer"
                    src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

                <div class="relative p-4 sm:p-6 lg:p-8">
                    <div class="mt-32 sm:mt-48 lg:mt-64">
                        <div
                            class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="text-sm text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis
                                perferendis hic asperiores quibusdam quidem voluptates doloremque
                                reiciendis nostrum harum. Repudiandae?
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}

        </div>
    </div>
@endsection
