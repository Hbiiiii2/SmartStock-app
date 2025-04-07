<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-12 w-12 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-bold">Welcome to SmartStock Admin</h3>
                            <p class="mt-1 text-indigo-100">Your inventory management system at a glance</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Products -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-5-5-5 5m10 0l-5 5-5-5"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Products</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $totalProducts }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Low Stock Items -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Low Stock Items</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $lowStockItems }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Suppliers -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Suppliers</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $totalSuppliers }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Categories</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">{{ $totalCategories }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Products -->
                <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Recent Products</h3>
                            <a href="{{ route('products.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($recentProducts as $product)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                        <span class="text-indigo-600 font-medium">{{ substr($product->name, 0, 2) }}</span>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                                    <div class="text-sm text-gray-500">SKU: {{ $product->sku }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $product->stock }} {{ $product->unit }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($product->stock <= $product->min_stock)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Low Stock
                                                </span>
                                            @elseif($product->stock == 0)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Out of Stock
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    In Stock
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No products found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Notifications -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-4">
                            <a href="{{ route('products.create') }}" class="flex items-center p-3 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors duration-150">
                                <div class="flex-shrink-0 bg-indigo-500 rounded-md p-2">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-indigo-900">Add New Product</p>
                                    <p class="text-xs text-indigo-500">Create a new product entry</p>
                                </div>
                            </a>
                            <a href="{{ route('stock-in.create') }}" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-150">
                                <div class="flex-shrink-0 bg-green-500 rounded-md p-2">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-900">Stock Adjustment</p>
                                    <p class="text-xs text-green-500">Update product quantities</p>
                                </div>
                            </a>
                            <a href="{{ route('reports.stock') }}" class="flex items-center p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                <div class="p-3 bg-blue-100 rounded-full">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">Generate Report</h3>
                                    <p class="text-sm text-gray-600">Create and download stock reports</p>
                                </div>
                            </a>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Reports</h3>
                            <div class="grid grid-cols-1 gap-4">
                                <a href="{{ route('reports.stock') }}" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-2">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-blue-900">Stock Report</p>
                                        <p class="text-xs text-blue-500">View current stock levels</p>
                                    </div>
                                </a>
                                <a href="{{ route('reports.stockIn') }}" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-green-500 rounded-md p-2">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-900">Stock In Report</p>
                                        <p class="text-xs text-green-500">View incoming stock</p>
                                    </div>
                                </a>
                                <a href="{{ route('reports.stockOut') }}" class="flex items-center p-3 bg-red-50 rounded-lg hover:bg-red-100 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-red-500 rounded-md p-2">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-900">Stock Out Report</p>
                                        <p class="text-xs text-red-500">View outgoing stock</p>
                                    </div>
                                </a>
                                <a href="{{ route('reports.profit') }}" class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-2">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-purple-900">Profit Report</p>
                                        <p class="text-xs text-purple-500">View profit analysis</p>
                                    </div>
                                </a>
                                <a href="{{ route('reports.period') }}" class="flex items-center p-3 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors duration-150">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-2">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-indigo-900">Period Report</p>
                                        <p class="text-xs text-indigo-500">View period-based reports</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Notifications</h3>
                            <div class="space-y-4">
                                @forelse($lowStockAlerts as $product)
                                <div class="flex items-start p-3 bg-red-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-900">Low Stock Alert</p>
                                        <p class="text-xs text-red-500">{{ $product->name }} ({{ $product->stock }} {{ $product->unit }})</p>
                                    </div>
                                </div>
                                @empty
                                <div class="flex items-start p-3 bg-green-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-900">All Good</p>
                                        <p class="text-xs text-green-500">No low stock alerts</p>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Stock Level Chart -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Stock Levels by Category</h3>
                        <div class="h-64 flex items-center justify-center">
                            @if($stockByCategory->count() > 0)
                                <div class="w-full h-full">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($stockByCategory as $category)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->products_count }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->products_sum_stock }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center">
                                    <p class="text-gray-500">No category data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Activity</h3>
                        <div class="flow-root">
                            <ul class="-mb-8">
                                @forelse($stockActivities as $activity)
                                <li>
                                    <div class="relative pb-8">
                                        @if(!$loop->last)
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        @endif
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-{{ $activity['color'] }}-500 flex items-center justify-center ring-8 ring-white">
                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        @if($activity['icon'] == 'plus-circle')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                        @else
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                        @endif
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500">{{ $activity['type'] == 'stock_in' ? 'Added' : 'Removed' }} <span class="font-medium text-gray-900">{{ $activity['quantity'] }}</span> units of <span class="font-medium text-gray-900">{{ $activity['product'] }}</span></p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time datetime="{{ $activity['date'] }}">{{ \Carbon\Carbon::parse($activity['date'])->diffForHumans() }}</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <li>
                                    <div class="text-center text-sm text-gray-500 py-4">
                                        No recent activity
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Admin Dashboard</h2>
                <a href="{{ route('reports.stock') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    View Stock Report
                </a>
            </div>

            <!-- Reports Section -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Reports</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('reports.stock') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Stock Report</h4>
                                <p class="text-xs text-gray-500">View current stock levels</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('reports.stockIn') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Stock In Report</h4>
                                <p class="text-xs text-gray-500">View incoming stock</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('reports.stockOut') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Stock Out Report</h4>
                                <p class="text-xs text-gray-500">View outgoing stock</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('reports.profit') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Profit Report</h4>
                                <p class="text-xs text-gray-500">View profit analysis</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 