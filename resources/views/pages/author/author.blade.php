<x-layout.app>
    <section class="py-16 px-4 max-w-4xl mx-auto">
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="/author"
                class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Author
            </a>
            <a href="/category"
                class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Category
            </a>
        </div>
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Authors</h1>

        <ul class="space-y-2">
            @foreach ($authors as $author)
                <li>
                    <a href="/author/{{$author->id}}/article" class="text-rose-600 hover:underline hover:text-rose-600 font-medium">
                        {{ $author->name }}
                    </a>
                </li>
            @endforeach
        </ul>





</x-layout.app>
