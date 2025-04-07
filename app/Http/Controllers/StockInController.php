<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::with(['product', 'supplier'])->latest()->get();
        $products = Product::all();
        $categories = Category::all();
        return view('stock-in.index', compact('stockIns', 'products', 'categories'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('stock-in.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'received_at' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'supplier_id' => 'required|exists:suppliers,id',
            'notes' => 'nullable|string',
        ]);

        $stockIn = StockIn::create($validated);
        
        // Update product stock
        $product = Product::find($validated['product_id']);
        $product->stock += $validated['quantity'];
        $product->save();

        return redirect()->route('stock-in.index')
            ->with('success', 'Stock in recorded successfully.');
    }

    public function edit(StockIn $stockIn)
    {
        $products = Product::all();
        return view('stock-in.edit', compact('stockIn', 'products'));
    }

    public function update(Request $request, StockIn $stockIn)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'received_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Revert old stock
        $product = Product::find($stockIn->product_id);
        $product->stock -= $stockIn->quantity;
        
        // Update with new stock
        if ($stockIn->product_id == $validated['product_id']) {
            $product->stock += $validated['quantity'];
            $product->save();
        } else {
            $product->save();
            $newProduct = Product::find($validated['product_id']);
            $newProduct->stock += $validated['quantity'];
            $newProduct->save();
        }

        $stockIn->update($validated);

        return redirect()->route('stock-in.index')
            ->with('success', 'Stock in updated successfully.');
    }

    public function destroy(StockIn $stockIn)
    {
        // Restore product stock before deleting
        $product = $stockIn->product;
        $product->stock -= $stockIn->quantity;
        $product->save();

        $stockIn->delete();

        return redirect()->route('stock-in.index')
            ->with('success', 'Stock in deleted successfully.');
    }
}
