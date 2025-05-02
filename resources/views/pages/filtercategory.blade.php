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
        <h1 class="text-2xl font-bold mb-4 text-gray-800">{{ $category }}</h1>






        @foreach ($categoryArticles as $categoryArticle)
            <article class="flex flex-col md:flex-row gap-6 bg-white rounded-lg overflow-hidden shadow-sm">
                <div class="md:w-2/5">
                    <img src={{ Storage::url($categoryArticle->image) }} alt="Desk workspace with keyboard and phone"
                        class="h-64 md:h-full w-full object-cover">
                </div>
                <div class="md:w-3/5 p-6 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-sm text-gray-500">{{ $categoryArticle->postdate }}</span>
                        <span class="text-sm text-gray-500">•</span>
                        <a href="/article/detail/{{ $categoryArticle->id }}"
                            class="text-sm font-medium text-rose-600 hover:text-rose-700">
                            {{ $categoryArticle->category }}
                        </a>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        <a href="/article/detail/{{ $categoryArticle->id }}"
                            class="hover:text-rose-600 transition-colors">
                            {{ $categoryArticle->title }}
                        </a>
                    </h3>

                    <p class="text-gray-600 mb-4">
                        {{ $categoryArticle->content }}
                    </p>

                    <div class="flex items-center mt-4">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $categoryArticle->authorname }}</p>
                            <p class="text-sm text-gray-500">{{ $categoryArticle->authortitle }}</p>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach



</x-layout.app>
