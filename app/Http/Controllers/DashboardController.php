<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total products count
        $totalProducts = Product::count();
        
        // Get low stock items (where stock <= min_stock)
        $lowStockItems = Product::whereRaw('stock <= min_stock')->count();
        
        // Get total suppliers
        $totalSuppliers = Supplier::count();
        
        // Get total categories
        $totalCategories = Category::count();
        
        // Get recent products (latest 5)
        $recentProducts = Product::with(['category'])
            ->latest()
            ->take(5)
            ->get();
        
        // Get low stock alerts
        $lowStockAlerts = Product::whereRaw('stock <= min_stock')
            ->take(3)
            ->get();
        
        // Get recent stock activities
        $stockActivities = collect();
        
        // Get recent stock ins
        $recentStockIns = StockIn::with(['product'])
            ->latest()
            ->take(5)
            ->get();
            
        foreach ($recentStockIns as $stockIn) {
            $stockActivities->push([
                'type' => 'stock_in',
                'product' => $stockIn->product->name,
                'quantity' => $stockIn->quantity,
                'date' => $stockIn->received_at,
                'icon' => 'plus-circle',
                'color' => 'green',
            ]);
        }
        
        // Get recent stock outs
        $recentStockOuts = StockOut::with(['product'])
            ->latest()
            ->take(5)
            ->get();
            
        foreach ($recentStockOuts as $stockOut) {
            $stockActivities->push([
                'type' => 'stock_out',
                'product' => $stockOut->product->name,
                'quantity' => $stockOut->quantity,
                'date' => $stockOut->removed_at,
                'icon' => 'minus-circle',
                'color' => 'red',
            ]);
        }
        
        // Sort activities by date
        $stockActivities = $stockActivities->sortByDesc('date')->take(5);
        
        // Get stock levels by category
        $stockByCategory = Category::withCount('products')
            ->withSum('products', 'stock')
            ->get();
        
        return view('dashboard', compact(
            'totalProducts',
            'lowStockItems',
            'totalSuppliers',
            'totalCategories',
            'recentProducts',
            'lowStockAlerts',
            'stockActivities',
            'stockByCategory'
        ));
    }
} 