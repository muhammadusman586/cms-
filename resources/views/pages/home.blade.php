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
        <div class="flex flex-col gap-8">
            <!-- First Article -->


            @foreach ($articles as $article)
                <article class="flex flex-col md:flex-row gap-6 bg-white rounded-lg overflow-hidden shadow-sm">
                    <div class="md:w-2/5">
                        <img src={{ Storage::url($article->image) }} alt="Desk workspace with keyboard and phone"
                            class="h-64 md:h-full w-full object-cover">
                    </div>
                    <div class="md:w-3/5 p-6 flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-sm text-gray-500">{{ $article->postdate }}</span>
                            <span class="text-sm text-gray-500">•</span>
                            <a href="#" class="text-sm font-medium text-rose-600 hover:text-rose-700">
                                {{ $article->category }}
                            </a>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            <a href="/article/detail/{{$article->id}}" class="hover:text-rose-600 transition-colors">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="text-gray-600 mb-4">
                            {{ $article->content }}
                        </p>

                        <div class="flex items-center mt-4">
                            {{-- <div class="h-10 w-10 mr-3 rounded-full bg-gray-200 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Foster"
                                    class="h-full w-full object-cover">
                            </div> --}}
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $article->authorname }}</p>
                                <p class="text-sm text-gray-500">{{ $article->authortitle }}</p>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach





</x-layout.app>
