<x-layout.app>
    <section class="py-16 px-4 max-w-4xl mx-auto">
        @if ($articles && $articles->count())
            <div class="flex flex-col gap-8">
                @forelse ($articles as $article)
                    <article class="flex flex-col md:flex-row gap-6 bg-white rounded-lg overflow-hidden shadow-sm">
                        <div class="md:w-2/5">
                            <img src="{{ Storage::url($article->image) }}" class="h-64 md:h-full w-full object-cover">
                        </div>
                        <div class="md:w-3/5 p-6 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-sm text-gray-500">{{ $article->postdate }}</span>
                                <span class="text-sm text-gray-500">•</span>
                                <a href="#" class="text-sm font-medium text-rose-600 hover:text-rose-700">
                                    {{ $article->category->category ?? 'Uncategorized' }}
                                </a>
                            </div>

                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                <a href="/article/detail/{{ $article->id }}" class="hover:text-rose-600 transition-colors">
                                    {{ $article->title }}
                                </a>
                            </h3>

                            <p class="text-gray-600 mb-4">
                                {{ \Illuminate\Support\Str::limit($article->content, 120) }}
                            </p>

                            <div class="flex items-center mt-4">
                                <div class="h-10 w-10 mr-3 rounded-full bg-gray-200 overflow-hidden">
                                    <img src="{{ Storage::url($article->author->authorimage) }}"
                                        alt="{{ $article->author->name }}" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $article->author->name ?? 'Unknown' }}</p>
                                    <p class="text-sm text-gray-500">{{ $article->author->authortitle ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="text-gray-600 text-center">No articles Present</p>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        @else
            <p class="text-gray-600 text-center">No articles Present</p>
        @endif
    </section>
</x-layout.app>
