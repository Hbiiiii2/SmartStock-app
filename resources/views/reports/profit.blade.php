<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profit Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Date Filter -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('reports.profit') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" value="{{ $startDate }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date" value="{{ $endDate }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-green-800">Total Revenue</h3>
                            <p class="text-2xl font-bold text-green-600">
                                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="bg-red-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-red-800">Total Cost</h3>
                            <p class="text-2xl font-bold text-red-600">
                                Rp {{ number_format($totalCost, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-blue-800">Net Profit</h3>
                            <p class="text-2xl font-bold text-blue-600">
                                Rp {{ number_format($netProfit, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Product Profit Table -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profit by Product</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock In</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock Out</th>
                                        
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revenue</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cost</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profit</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($profits as $profit)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $profit['product'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $profit['stock_ins']->sum('quantity') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $profit['stock_outs']->sum('quantity') }}
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                Rp {{ number_format($profit['revenue'], 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                Rp {{ number_format($profit['cost'], 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $profit['profit'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                                Rp {{ number_format($profit['profit'], 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                                No profit data found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 