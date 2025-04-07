<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Stock Out') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('stock-out.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                                <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date', date('Y-m-d')) }}" required>
                                @error('date')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Product</label>
                                <select name="product_id" id="product_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }} ({{ $product->sku }}) - Stock: {{ $product->stock }} {{ $product->unit }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('quantity') }}" min="1" required>
                                @error('quantity')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="customer" class="block text-gray-700 text-sm font-bold mb-2">Customer</label>
                                <input type="text" name="customer" id="customer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('customer') }}" required>
                                @error('customer')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 md:col-span-2">
                                <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes</label>
                                <textarea name="notes" id="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('stock-out.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Back
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Stock Out
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 