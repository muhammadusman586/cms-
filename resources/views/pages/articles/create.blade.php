<x-layout.app>




      <section class="py-16 px-4 max-w-4xl mx-auto">
     
       
        <form class="bg-white rounded-lg shadow-sm p-8" method="POST" action="/article"  enctype="multipart/form-data"">
          @csrf
          
           <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700 mb-2">Blog Image</label>
            <div class="flex items-center justify-center w-full">
              <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                </div>
                <input id="image" name="image" type="file" class="hidden" accept="image/*" />
              </label>
            </div>
            {{-- @error('image')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
          </div>
    
          <!-- Date Field -->
          <div class="mb-6">
            <label for="postdate" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
            
            
            <input type="date" id="postdate" name="postdate"  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
            {{-- @error('post_date')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
          </div>
    
          <!-- Category Field -->
          <div class="mb-6">
            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <select id="category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
              <option value="">Select a category</option>
              <option >Tech</option>
              <option >Health</option>
              <option >Sports</option>
              <option >Politics</option>
              <option >Entertainment</option>
            </select>
            {{-- @error('category')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
          </div>
    
          <!-- Title Field -->
          <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter blog title"  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
            {{-- @error('title')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
          </div>
    
          <!-- Content Field -->
          <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
            <textarea id="content" name="content" rows="6" placeholder="Write your blog content here..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">Content</textarea>
            {{-- @error('content')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
          </div>
    
          <!-- Author Information -->
          <div class="mb-6 border-t pt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Author Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="authorname" class="block text-sm font-medium text-gray-700 mb-2">Author Name</label>
                <input type="text" id="authorname" name="authorname" placeholder="Enter author name"  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                {{-- @error('author_name')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
              </div>
              
              <div>
                <label for="authortitle" class="block text-sm font-medium text-gray-700 mb-2">Author Title</label>
                <input type="text" id="authortitle" name="authortitle" placeholder="E.g. Co-Founder / CTO"  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                {{-- @error('author_title')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
              </div>
            </div>
            
        
    
          <!-- Submit Buttons -->
          <div class="flex justify-end space-x-4 mt-8">
            <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              Create Post
            </button>
          </div>
        </form>
      </section>


</x-layout.app>    