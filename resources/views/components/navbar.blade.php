<aside class="w-64 h-screen bg-white border-r border-gray-200 fixed">
    <div class="p-6">
        <a href="/" class="flex items-center space-x-2">
            <img class="h-10 w-auto"
                src="https://t4.ftcdn.net/jpg/04/40/92/73/360_F_440927321_zJ6igoZT1uiGLtqUbAGt8YNBFPkRRqz7.jpg"
                alt="CMS Logo">
            <span class="sr-only">CMS</span>
        </a>
    </div>

    <nav class="mt-6 space-y-2">
     @auth
    @if (auth()->user()->hasRole('Super Admin'))
        <a href="/tenant" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Create Tenant
        </a>

        <a href="/author" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Authors
        </a>
        <a href="/category" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Categories
        </a>
        <a href="/article" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Create Article
        </a>
        <a href="/author/create" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Create Author
        </a>
        <a href="/category/create" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Create Category
        </a>

          <a href="/contact-us" class="block px-6 py-2 text-gray-900 font-semibold hover:bg-gray-100 rounded">
            Contact Us
        </a>
    @endif
@endauth


    <div class="mt-10 border-t pt-4 px-6">
        @auth
            <p class="text-gray-900 font-semibold mb-2">{{ Auth::user()->name }}</p>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-sm font-semibold text-red-600 hover:underline">
                    Logout →
                </button>
            </form>
        @else
            <a href="/login" class="text-sm font-semibold text-gray-900 hover:underline">
                Log in →
            </a>
        @endauth
    </div>
</aside>

<!-- Main content container -->
<div class="ml-64 p-6">
    <!-- Your main content goes here -->
</div>
