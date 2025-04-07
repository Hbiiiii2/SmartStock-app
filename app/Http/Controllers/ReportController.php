<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function stockReport()
    {
        $products = Product::all();
        return view('reports.stock', compact('products'));
    }

    public function stockInReport()
    {
        $stockIns = StockIn::with('product')->get();
        return view('reports.stockIn', compact('stockIns'));
    }

    public function stockOutReport()
    {
        $stockOuts = StockOut::with('product')->get();
        return view('reports.stockOut', compact('stockOuts'));
    }

    public function profitReport()
    {
        $products = Product::all();
        $stockIns = StockIn::with('product')->get();
        $stockOuts = StockOut::with('product')->get();
        return view('reports.profit', compact('products', 'stockIns', 'stockOuts'));
    }

    public function periodReport(Request $request)
    {
        $period = $request->input('period', 'daily');
        $stockIns = StockIn::with('product')->get();
        $stockOuts = StockOut::with('product')->get();
        return view('reports.period', compact('stockIns', 'stockOuts', 'period'));
    }
} 