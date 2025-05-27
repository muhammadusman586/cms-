<x-layout.app>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto"
                    src="https://t4.ftcdn.net/jpg/04/40/92/73/360_F_440927321_zJ6igoZT1uiGLtqUbAGt8YNBFPkRRqz7.jpg" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create your account</h2>
            </div>
    
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/signup" method="POST">
                     @csrf
                    <div>
                        <label for="name" class="block text-sm/6 font-medium text-gray-900"> Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" autocomplete="name" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    {{-- <div>
                        <label for="lastname" class="block text-sm/6 font-medium text-gray-900">Last Name</label>
                        <div class="mt-2">
                            <input type="text" name="lastname" id="lastname" autocomplete="lastname" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div> --}}


                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
    
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                           
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="current-password" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
    
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Create
                            </button>
                    </div>
                </form>

                 <p class="mt-10 text-center text-sm/6 text-gray-500">
                    Login As a Tenant
                    <a href="" class="font-semibold text-indigo-600 hover:text-indigo-500">
                     Login Tenant
                    </a>
                </p>
    
                <p class="mt-10 text-center text-sm/6 text-gray-500">
                     Have a Account?
                    <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">
                    Login
                    </a>
                </p>
            </div>
    </div>
    
    </x-layout.app>
    