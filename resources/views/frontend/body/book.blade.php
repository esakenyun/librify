<div class="bg-[#faeee7]">
    <div class="py-8 md:py-9 lg:py-10">
        <h1 class="font-bold py-2 ml-10 text-[#33272a] text-2xl md:text-3xl  lg:ml-48">Popular Books</h1>

        <div
            class="py-5 overflow-x-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:'none'] [scrollbar-width:'none'] flex space-x-5 lg:space-x-20">
            @forelse ($books as $book)
                <div class="flex-none border-2 border-[#33272a] border-solid  ml-10 lg:ml-48 lg:w-64 lg:border-4">
                    <a href="{{ url('/books/detail/' . $book->id) }}" class="group relative block bg-black">
                        <img alt="book" src="{{ asset('storage/' . $book->image) }}"
                            class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                        <div class="relative p-4 sm:p-6 lg:p-8">
                            <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                                Trending
                            </p>

                            <div class="mt-32 sm:mt-48 lg:mt-64">
                                <div
                                    class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                    <p class="text-sm white text-white">
                                        <br>
                                        Read More
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <h2>No Popular Books</h2>
            @endforelse
            {{-- <div class="flex-none border-2 border-amber-600 ml-10 lg:ml-48 lg:w-64 lg:border-4">
                <a href="#" class="group relative block bg-black">
                    <img alt="book"
                        src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-4 sm:p-6 lg:p-8">
                        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                            New Book
                        </p>
                        <p class="text-xl font-bold text-white sm:text-2xl">Buku Baru</p>
                        <div class="mt-32 sm:mt-48 lg:mt-64">
                            <div
                                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    Simple desc
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex-none border-2 border-amber-600 ml-10 lg:ml-48 lg:w-64 lg:border-4">
                <a href="#" class="group relative block bg-black">
                    <img alt="book"
                        src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-4 sm:p-6 lg:p-8">
                        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                            New Book
                        </p>
                        <p class="text-xl font-bold text-white sm:text-2xl">Buku Baru</p>
                        <div class="mt-32 sm:mt-48 lg:mt-64">
                            <div
                                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    Simple desc
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex-none border-2 border-amber-600 ml-10 lg:ml-48 lg:w-64 lg:border-4">
                <a href="#" class="group relative block bg-black">
                    <img alt="book"
                        src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-4 sm:p-6 lg:p-8">
                        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                            New Book
                        </p>
                        <p class="text-xl font-bold text-white sm:text-2xl">Buku Baru</p>
                        <div class="mt-32 sm:mt-48 lg:mt-64">
                            <div
                                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    Simple desc
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex-none border-2 border-amber-600 ml-10 lg:ml-48 lg:w-64 lg:border-4">
                <a href="#" class="group relative block bg-black">
                    <img alt="book"
                        src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-4 sm:p-6 lg:p-8">
                        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                            New Book
                        </p>
                        <p class="text-xl font-bold text-white sm:text-2xl">Buku Baru</p>
                        <div class="mt-32 sm:mt-48 lg:mt-64">
                            <div
                                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    Simple desc
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex-none border-2 border-amber-600 ml-10 lg:ml-48 lg:w-64 lg:border-4">
                <a href="#" class="group relative block bg-black">
                    <img alt="book"
                        src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
                        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                    <div class="relative p-4 sm:p-6 lg:p-8">
                        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                            New Book
                        </p>
                        <p class="text-xl font-bold text-white sm:text-2xl">Buku Baru</p>
                        <div class="mt-32 sm:mt-48 lg:mt-64">
                            <div
                                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    Simple desc
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>

        {{-- <div
            class="overflow-x-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:'none'] [scrollbar-width:'none'] flex space-x-5 lg:space-x-20">
            <div class="flex-none border-4 ml-10  lg:ml-48 ">
                <img src="https://openlibrary.telkomuniversity.ac.id/uploads/book/cover/23.01.1305.jpg" alt="Book"
                    class="w-40 lg:w-60">
            </div>
            <div class="flex-none border-4 ml-10  lg:ml-48 ">
                <img src="https://openlibrary.telkomuniversity.ac.id/uploads/book/cover/23.01.1305.jpg" alt="Book"
                    class="w-40 lg:w-60">
            </div>
            <div class="flex-none border-4 ml-10  lg:ml-48 ">
                <img src="https://openlibrary.telkomuniversity.ac.id/uploads/book/cover/23.01.1305.jpg" alt="Book"
                    class="w-40 lg:w-60">
            </div>
            <div class="flex-none border-4 ml-10  lg:ml-48 ">
                <img src="https://openlibrary.telkomuniversity.ac.id/uploads/book/cover/23.01.1305.jpg" alt="Book"
                    class="w-40 lg:w-60">
            </div>
            <div class="flex-none border-4 ml-10  lg:ml-48 ">
                <img src="https://openlibrary.telkomuniversity.ac.id/uploads/book/cover/23.01.1305.jpg" alt="Book"
                    class="w-40 lg:w-60">
            </div>
            <div class="flex-none border-4 ml-10  lg:ml-48 ">
                <img src="https://openlibrary.telkomuniversity.ac.id/uploads/book/cover/23.01.1305.jpg" alt="Book"
                    class="w-40 lg:w-60">
            </div>

        </div> --}}
    </div>
</div>
