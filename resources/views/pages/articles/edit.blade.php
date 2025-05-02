<x-layout.app>
  <section class="py-16 px-4 max-w-4xl mx-auto">
    <form class="bg-white rounded-lg shadow-sm p-8" method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- Image Upload -->
      <div class="mb-8">
        <label class="block text-sm font-medium text-gray-700 mb-2">Blog Image</label>
        <div class="flex items-center justify-center w-full">
          <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
              </svg>
              <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
              <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
            </div>
            <input id="image" name="image" type="file" class="hidden" accept="image/*" />
          </label>
        </div>
      </div>

      <!-- Date -->
      <div class="mb-6">
        <label for="postdate" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
        <input type="date" id="postdate" name="postdate" value="{{ $article->postdate }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-rose-500 focus:border-rose-500">
      </div>

      <!-- Category -->
      <div class="mb-6">
        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
        <select id="category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-rose-500 focus:border-rose-500">
          <option value="">Select a category</option>
          @foreach(['Tech', 'Health', 'Sports', 'Politics', 'Entertainment'] as $cat)
            <option value="{{ $cat }}" {{ $article->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
          @endforeach
        </select>
      </div>

      <!-- Title -->
      <div class="mb-6">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
        <input type="text" id="title" name="title" value="{{ $article->title }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-rose-500 focus:border-rose-500">
      </div>

      <!-- Content -->
      <div class="mb-6">
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
        <textarea id="content" name="content" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-rose-500 focus:border-rose-500">{{ $article->content }}</textarea>
      </div>

      <!-- Author Info -->
      <div class="mb-6 border-t pt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Author Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="authorname" class="block text-sm font-medium text-gray-700 mb-2">Author Name</label>
            <input type="text" id="authorname" name="authorname" value="{{ $article->authorname }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-rose-500 focus:border-rose-500">
          </div>

          <div>
            <label for="authortitle" class="block text-sm font-medium text-gray-700 mb-2">Author Title</label>
            <input type="text" id="authortitle" name="authortitle" value="{{ $article->authortitle }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-rose-500 focus:border-rose-500">
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-4 mt-8">
        <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
          Cancel
        </a>
        <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700">
          Update Post
        </button>
      </div>
    </form>
  </section>
</x-layout.app>
