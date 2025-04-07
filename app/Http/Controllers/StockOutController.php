<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public function index()
    {
        $stockOuts = StockOut::with('product')->get();
        $products = Product::all();
        $categories = Category::all();
        return view('stock-out.index', compact('stockOuts', 'products', 'categories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock-out.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'removed_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $product = Product::find($validated['product_id']);
        
        // Check if stock is sufficient
        if ($product->stock < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Insufficient stock available.'])
                        ->withInput();
        }

        $stockOut = StockOut::create($validated);
        
        // Update product stock
        $product->stock -= $validated['quantity'];
        $product->save();

        return redirect()->route('stock-out.index')
            ->with('success', 'Stock out recorded successfully.');
    }

    public function edit(StockOut $stockOut)
    {
        $products = Product::all();
        return view('stock-out.edit', compact('stockOut', 'products'));
    }

    public function update(Request $request, StockOut $stockOut)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'removed_at' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Revert old stock
        $product = Product::find($stockOut->product_id);
        $product->stock += $stockOut->quantity;
        
        // Check if new stock is sufficient
        if ($stockOut->product_id == $validated['product_id']) {
            if ($product->stock < $validated['quantity']) {
                return back()->withErrors(['quantity' => 'Insufficient stock available.'])
                            ->withInput();
            }
            $product->stock -= $validated['quantity'];
            $product->save();
        } else {
            $product->save();
            $newProduct = Product::find($validated['product_id']);
            if ($newProduct->stock < $validated['quantity']) {
                return back()->withErrors(['quantity' => 'Insufficient stock available.'])
                            ->withInput();
            }
            $newProduct->stock -= $validated['quantity'];
            $newProduct->save();
        }

        $stockOut->update($validated);

        return redirect()->route('stock-out.index')
            ->with('success', 'Stock out updated successfully.');
    }

    public function destroy(StockOut $stockOut)
    {
        // Revert the stock
        $product = Product::find($stockOut->product_id);
        $product->stock += $stockOut->quantity;
        $product->save();

        $stockOut->delete();

        return redirect()->route('stock-out.index')
            ->with('success', 'Stock out deleted successfully.');
    }
}
