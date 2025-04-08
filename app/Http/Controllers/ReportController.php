<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function stockReport()
    {
        $products = Product::with(['stockIns', 'stockOuts'])->get();
        return view('reports.stock', compact('products'));
    }

    public function stockInReport(Request $request)
    {
        $query = StockIn::with('product');
        
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }
        
        $stockIns = $query->get();
        return view('reports.stockIn', compact('stockIns'));
    }

    public function stockOutReport(Request $request)
    {
        $query = StockOut::with('product');
        
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }
        
        $stockOuts = $query->get();
        return view('reports.stockOut', compact('stockOuts'));
    }

    public function profitReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Load products with their stockIns and stockOuts, including the product relationship for stockIns
        $products = Product::with(['stockIns.product', 'stockOuts'])->get();
        $profits = [];

        $totalRevenue = 0;
        $totalCost = 0;

        // Log all products and their relationships
        Log::info('All products loaded:', [
            'products' => $products->map(function($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'purchase_price' => $product->purchase_price,
                    'selling_price' => $product->selling_price,
                    'stock_ins_count' => $product->stockIns->count(),
                    'stock_outs_count' => $product->stockOuts->count()
                ];
            })->toArray()
        ]);

        foreach ($products as $product) {
            // Filter berdasarkan tanggal jika disediakan
            $stockIns = $product->stockIns;
            $stockOuts = $product->stockOuts;

            if ($startDate && $endDate) {
                $stockIns = $stockIns->filter(function ($in) use ($startDate, $endDate) {
                    return $in->received_at >= Carbon::parse($startDate)->startOfDay() &&
                           $in->received_at <= Carbon::parse($endDate)->endOfDay();
                });

                $stockOuts = $stockOuts->filter(function ($out) use ($startDate, $endDate) {
                    return $out->removed_at >= Carbon::parse($startDate)->startOfDay() &&
                           $out->removed_at <= Carbon::parse($endDate)->endOfDay();
                });
            }

            // Log stockIns data for debugging
            Log::info('StockIns for product: ' . $product->name, [
                'product_id' => $product->id,
                'purchase_price' => $product->purchase_price,
                'stock_ins' => $stockIns->map(function($in) {
                    return [
                        'id' => $in->id,
                        'quantity' => $in->quantity,
                        'received_at' => $in->received_at,
                        'product_id' => $in->product_id,
                        'product' => $in->product ? [
                            'id' => $in->product->id,
                            'name' => $in->product->name,
                            'purchase_price' => $in->product->purchase_price
                        ] : null
                    ];
                })->toArray()
            ]);

            // Hitung Revenue & Cost berdasarkan stock out
            $totalOutQty = $stockOuts->sum('quantity');
            $productRevenue = $totalOutQty * $product->selling_price;
            $productCost = $totalOutQty * $product->purchase_price;
            $productProfit = $productRevenue - $productCost;

            $profits[] = [
                'product' => $product->name,
                'revenue' => $productRevenue,
                'cost' => $productCost,
                'profit' => $productProfit,
                'stock_ins' => $stockIns,
                'stock_outs' => $stockOuts,
                'purchase_price' => $product->purchase_price
            ];

            $totalRevenue += $productRevenue;
            $totalCost += $productCost;
        }

        $netProfit = $totalRevenue - $totalCost;

        // Log final totals
        Log::info('Final profit calculation', [
            'total_revenue' => $totalRevenue,
            'total_cost' => $totalCost,
            'net_profit' => $netProfit,
            'products_count' => count($profits)
        ]);

        return view('reports.profit', compact('profits', 'totalRevenue', 'totalCost', 'netProfit', 'startDate', 'endDate'));
    }

    public function periodReport(Request $request)
    {
        $period = $request->input('period', 'daily');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $queryStockIn = StockIn::with('product');
        $queryStockOut = StockOut::with('product');
        
        if ($startDate && $endDate) {
            $queryStockIn->whereBetween('created_at', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
            $queryStockOut->whereBetween('created_at', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
        } else {
            switch ($period) {
                case 'daily':
                    $queryStockIn->whereDate('created_at', Carbon::today());
                    $queryStockOut->whereDate('created_at', Carbon::today());
                    break;
                case 'weekly':
                    $queryStockIn->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    $queryStockOut->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;
                case 'monthly':
                    $queryStockIn->whereMonth('created_at', Carbon::now()->month);
                    $queryStockOut->whereMonth('created_at', Carbon::now()->month);
                    break;
                case 'yearly':
                    $queryStockIn->whereYear('created_at', Carbon::now()->year);
                    $queryStockOut->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }
        
        $stockIns = $queryStockIn->get();
        $stockOuts = $queryStockOut->get();
        
        return view('reports.period', compact('stockIns', 'stockOuts', 'period', 'startDate', 'endDate'));
    }
} 