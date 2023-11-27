<div class="bg-[#faeee7]">
    <div class="py-10">
        <h2 class="text-center text-3xl text-[#33272a] font-bold">Category</h2>
        <div
            class="grid grid-rows-3 grid-flow-col md:grid-rows-2 lg:grid-rows-2 gap-7 mt-7 mx-2 md:gap-10 md:mx-16 lg:gap-10 lg:mx-36">
            @forelse ($categories as $category)
                <a class="group relative inline-block text-sm font-medium text-center text-white focus:outline-none focus:ring active:text-slate-200"
                    href="{{ url('/categories/' . $category->name . '/book') }}">
                    <span
                        class="absolute inset-0 translate-x-0 translate-y-0 bg-[#33272a] transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                    <span class="relative block border border-current bg-[#594a4e] px-8 py-3">
                        {{ $category->name }}
                    </span>
                </a>
            @empty
                <h2>No Categories Found</h2>
            @endforelse

            {{-- <a class="group relative inline-block text-sm font-medium text-center text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="#">
                <span
                    class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                <span class="relative block border border-current bg-white px-8 py-3">
                    Math
                </span> --}}
            {{-- </a>
            <a class="group relative inline-block text-sm font-medium text-center text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="#">
                <span
                    class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                <span class="relative block border border-current bg-white px-8 py-3">
                    Science
                </span>
            </a>
            <a class="group relative inline-block text-sm font-medium text-center text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="#">
                <span
                    class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                <span class="relative block border border-current bg-white px-8 py-3">
                    Program
                </span>
            </a>
            <a class="group relative inline-block text-sm font-medium text-center text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="#">
                <span
                    class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                <span class="relative block border border-current bg-white px-8 py-3">
                    History
                </span>
            </a>
            <a class="group relative inline-block text-sm font-medium text-center text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="#">
                <span
                    class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                <span class="relative block border border-current bg-white px-8 py-3">
                    Religion
                </span>
            </a>
            <a class="group relative inline-block text-sm font-medium text-center text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                href="#">
                <span
                    class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-y-0.5 group-hover:translate-x-0.5"></span>

                <span class="relative block border border-current bg-white px-8 py-3">
                    Bab
                </span>
            </a> --}}

        </div>
        <div class="mt-14 flex justify-center items-center">
            <a class="group relative inline-block text-sm font-medium text-white focus:outline-none focus:ring"
                href="{{ url('/categories') }}">
                <span class="absolute inset-0 border border-[#ff8ba7] group-active:border-[#ffc6c7]"></span>
                <span
                    class="block border border-[#ff8ba7] bg-[#ff8ba7] px-12 py-3 transition-transform active:border-rose-300 active:bg-rose-300 group-hover:-translate-x-1 group-hover:-translate-y-1">
                    View More
                </span>
            </a>

        </div>
    </div>
</div>
