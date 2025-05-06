<x-layout.app>
    <section class="py-16 px-4 max-w-4xl mx-auto">

        <!-- Navigation Buttons -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="/author" class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Author
            </a>
            <a href="/category" class="px-4 py-2 rounded-full bg-rose-600 text-white font-medium hover:bg-rose-700 transition-colors">
                Category
            </a>
        </div>

        <!-- Author Name -->
        <h1 class="text-2xl font-bold mb-4 text-gray-800">
            {{ $categoryWiseArticles->first()?->category->category ?? 'Unknown Category' }}
        </h1>

        <!-- Articles Loop -->
        @forelse ($categoryWiseArticles as $categoryWiseArticle)
            <article class="flex flex-col md:flex-row gap-6 bg-white rounded-lg overflow-hidden shadow-sm mb-6">
                <div class="md:w-2/5">
                    <img src="{{ Storage::url($categoryWiseArticle->image) }}" alt="{{ $categoryWiseArticle->title }}"
                        class="h-64 md:h-full w-full object-cover">
                </div>
                <div class="md:w-3/5 p-6 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-sm text-gray-500">{{ $categoryWiseArticle->postdate }}</span>
                        <span class="text-sm text-gray-500">•</span>
                        <a href="#" class="text-sm font-medium text-rose-600 hover:text-rose-700">
                            {{ $categoryWiseArticle->category->category }}
                        </a>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        <a href="#" class="hover:text-rose-600 transition-colors">
                            {{ $categoryWiseArticle->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ $categoryWiseArticle->content }}
                    </p>
                    <div class="flex items-center mt-4">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $categoryWiseArticle->authorname }}</p>
                            <p class="text-sm text-gray-500">{{ $categoryWiseArticle->authortitle }}</p>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Update/Delete Buttons -->
            <div class="mt-2 flex gap-3 mb-10">
                <a href="{{ route('articles.edit', $categoryWiseArticle->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Update
                </a>
                <form action="{{ route('articles.destroy', $categoryWiseArticle->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this article?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-600 text-center">No articles found for this author.</p>
        @endforelse

    </section>
</x-layout.app>
