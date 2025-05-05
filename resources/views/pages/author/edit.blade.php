<x-layout.app>

    <section class="py-16 px-4 max-w-4xl mx-auto">

      
    <form class="bg-white rounded-lg shadow-sm p-8" method="POST" action="{{route('author.edit',$author->id)}}" enctype="multipart/form-data" >

      @csrf
      @method('PUT')
      <!-- Author Information -->
      <div class="mb-6  pt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Author Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Author Name</label>
            <input type="text" id="name" value="{{$author->authorname}}" name="name" placeholder="Enter author name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
          </div>
          
          <div>
            <label for="authortitle" class="block text-sm font-medium text-gray-700 mb-2">Author Title</label>
            <input type="text" id="authortitle" value="{{$author->authortitle}}" name="authortitle" placeholder="E.g. Co-Founder / CTO" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
          </div>
        </div>
        
        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700 mb-2">Author Avatar</label>
          <div class="flex items-center">
            <div class="h-12 w-12 rounded-full bg-gray-200 overflow-hidden mr-4">
              <img id="avatar-preview" src="{{$author->authorimage}}" alt="Author avatar" class="h-full w-full object-cover">
            </div>
            <label class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              Change Avatar
              <input type="file" class="hidden" id="authorimage" name="authorimage" accept="image/*">
            </label>
          </div>
        </div>
      </div>

      <!-- Submit Buttons -->
      <div class="flex justify-end space-x-4 mt-8">
        <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
          Cancel
        </button>
        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
          Create Author
        </button>
      </div>
    </form>
  </section>

 

</x-layout.app>    