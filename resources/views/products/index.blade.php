<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Products Management') }}
            </h2>
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg" role="alert">
                            <div class="flex">
                                <div class="py-1">
                                    <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold">Success</p>
                                    <p>{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-8">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Filter Products</h3>
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    <!-- Search Input -->
                                    <div class="col-span-1 md:col-span-2 lg:col-span-4">
                                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                                        <div class="flex space-x-3">
                                            <div class="relative flex-grow">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                    </svg>
                                                </div>
                                                <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    placeholder="Search by product name or SKU...">
                                            </div>
                                            <button type="submit" 
                                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                                Search
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Category Filter -->
                                    <div>
                                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                        <div class="relative">
                                            <select name="category_id" id="category_id" 
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">All Categories</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Supplier Filter -->
                                    <div>
                                        <label for="supplier_id" class="block text-sm font-medium text-gray-700 mb-2">Supplier</label>
                                        <div class="relative">
                                            <select name="supplier_id" id="supplier_id" 
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">All Suppliers</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                        {{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Stock Status Filter -->
                                    <div>
                                        <label for="stock_status" class="block text-sm font-medium text-gray-700 mb-2">Stock Status</label>
                                        <div class="relative">
                                            <select name="stock_status" id="stock_status" 
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">All Stock Status</option>
                                                <option value="low" {{ request('stock_status') == 'low' ? 'selected' : '' }}>Low Stock</option>
                                                <option value="out" {{ request('stock_status') == 'out' ? 'selected' : '' }}>Out of Stock</option>
                                                <option value="normal" {{ request('stock_status') == 'normal' ? 'selected' : '' }}>Normal Stock</option>
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter Actions -->
                                <div class="mt-6 flex items-center justify-end space-x-4">
                                    <a href="{{ route('products.index') }}" 
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Reset Filters
                                    </a>
                                    <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                        </svg>
                                        Apply Filters
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->sku }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->category->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->supplier->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->stock <= $product->min_stock ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->unit }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this product?')">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                </svg>
                                                <p class="text-lg font-medium">No products found</p>
                                                <p class="text-sm text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 