<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock In Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Filter Section -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('reports.stockIn') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Report Table -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price per Unit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Cost</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($stockIns as $stockIn)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $stockIn->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $stockIn->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $stockIn->product->category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $stockIn->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($stockIn->price_per_unit, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($stockIn->quantity * $stockIn->price_per_unit, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No stock-in records found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 