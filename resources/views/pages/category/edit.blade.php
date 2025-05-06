<x-layout.app>
  <section class="py-16 px-4 max-w-4xl mx-auto">
      
      <!-- Update Form -->
      <form method="POST" class="bg-white rounded-lg shadow-sm p-8" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Category Field -->
          <div class="mb-6">
              <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
              <input type="text" id="category" name="category" value="{{ $category->category }}" placeholder="Enter category name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
          </div>

          <!-- Update Button -->
          <div class="flex justify-center space-x-4 mt-8">
              <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                  Update Category
              </button>
          </div>
      </form>

      
      <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="mt-4 flex justify-center">
          @csrf
          @method('DELETE')
          <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
              Delete Category
          </button>
      </form>

  </section>
</x-layout.app>
