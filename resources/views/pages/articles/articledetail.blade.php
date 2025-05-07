<x-layout.app>
    <section class="py-16 px-4 max-w-3xl mx-auto">
        {{-- <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="/author"
                class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Author
            </a>
            <a href="/category"
                class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Category
            </a>
        </div> --}}
        
        <div class="flex flex-col gap-8">
        <div class="md:w-2/5">
            <img src={{ Storage::url($article->image) }} alt={{$article->title}}
                class="h-64 md:h-full w-full object-cover">
        </div>

        <div class="mb-4 text-gray-500 text-sm">
            <span>{{ $article->postdate }}</span> • 
            <span>{{ $article->category->category }}</span>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>

        <div class="text-gray-700 leading-relaxed mb-8">
            {{ $article->content }}
        </div>

        <div class="border-t pt-4">
            <p class="text-lg font-medium text-gray-900">{{ $article->author->name }}</p>
            <p class="text-sm text-gray-500">{{ $article->author->authortitle }}</p>
        </div>
    </section>
</x-layout.app>
