<x-layout.app>
    <section class="py-16 px-4 max-w-4xl mx-auto">
        <form class="bg-white rounded-lg shadow-sm p-8" method="POST" action="/category" enctype="multipart/form-data"">
            @csrf
            <!-- Category Field -->
            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" id="category" name="category" placeholder="Enter blog title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                {{-- @error('title')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror --}}
            </div>
            <!-- Submit Buttons -->
            <div class="flex justify-center space-x-4 mt-8">

                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                    Create Category
                </button>
            </div>
        </form>
    </section>

    <div class="py-16 px-4 max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-8" method="POST" action="/article" enctype="multipart/form-data"">


            <div class="flex justify-start space-x-4 mt-8">
                @foreach ($categories as $category)
                    <a href="{{ route('category.edit', $category->id) }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                        {{ $category->category }}
                    </a>
                @endforeach


            </div>
        </div>
    </div>


</x-layout.app>
