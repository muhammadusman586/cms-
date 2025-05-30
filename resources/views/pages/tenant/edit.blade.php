<x-layout.app>
    <section class="py-16 px-4 max-w-4xl mx-auto">
        <form class="bg-white rounded-lg shadow-sm p-8" method="POST" action="{{ route('tenant.update', $tenant->id) }}" enctype="multipart/form-data">
            @csrf
            <!-- Tenant Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tenant</label>
                <input type="text" id="name" name="name" value="{{ $tenant->name }}"
                    placeholder="Enter tenant name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ $tenant->email }}"
                    placeholder="Enter tenant email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter new password (optional)"
                    placeholder="Enter tenant Password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
            </div>





            <div class="mb-6">
                <label for="permission" class="block text-sm font-medium text-gray-700 mb-2">Permission</label>
                <select id="permission" name="permission"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500">
                    <option value="" disabled selected>Select permission</option>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission }}">{{ ucfirst($permission) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center space-x-4 mt-8">
                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                    Update Tenant
                </button>
            </div>
        </form>

        <!-- Table of Tenants -->
        {{-- <div class="mt-12">
            <h2 class="text-xl font-semibold mb-4">Registered Tenants</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Tenant Name</th>
                            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Domain</th>
                            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Login</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($tenants as $tenant)
                            <tr>
                                <td class="py-3 px-6 text-sm text-gray-800">{{ $tenant->tenant_name }}</td>
                                <td class="py-3 px-6 text-sm text-gray-800">{{ $tenant->domain }}</td>
                                <td class="py-3 px-6 text-sm text-gray-800">
                                    <a href="{{ route('redirect.to.tenant', ['domain' => $tenant->domain]) }}"
                                        target="_blank"
                                        class="px-4 py-2 bg-rose-600 text-white text-sm rounded-md hover:bg-rose-700">
                                        Login
                                    </a>
                                     <a href="{{ route('tenant.edit', $tenant->id) }}"
                                        target="_blank"
                                        class="px-4 py-2 mx-4 bg-rose-600 text-white text-sm rounded-md hover:bg-rose-700">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-4 px-6 text-center text-gray-500">No tenants found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}
    </section>
</x-layout.app>
