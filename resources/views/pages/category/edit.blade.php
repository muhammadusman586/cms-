<x-layout.app>
    <section class="py-16 px-4 max-w-4xl mx-auto">
      <form class="bg-white rounded-lg shadow-sm p-8" method="POST" action="{{route('category.update',$category->id)}}"  enctype="multipart/form-data"">
          @csrf       
          @method('PUT')
         <!-- Category Field -->
         <div class="mb-6">
          <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
          <input type="text" id="category" name="category" value="{{$category->category}}" placeholder="Enter blog title"  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
          {{-- @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror --}}
        </div>
          <!-- Submit Buttons -->
          <div class="flex justify-center space-x-4 mt-8">
           
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              Update Category
            </button>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                Delete Category
              </button>
          </div>
        </form>
      </section>
  
  
  
  </x-layout.app>    