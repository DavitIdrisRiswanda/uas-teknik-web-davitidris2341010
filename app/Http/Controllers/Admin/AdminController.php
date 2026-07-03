<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalUser = User::count();

        $totalSeller = User::where('role', 'seller')->count();

        $totalBuyer = User::where('role', 'buyer')->count();

        $totalProduk = Product::count();

        $totalOrder = Order::count();

        $pendapatan = Order::where('status', 'completed')
            ->sum('total');

        $orders = Order::with('buyer')
            ->latest()
            ->take(5)
            ->get();

            $chart = Order::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(*) as total')
    )
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy('month')
    ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalSeller',
            'totalBuyer',
            'totalProduk',
            'totalOrder',
            'pendapatan',
            'orders',
            'chart'
        ));
    }
}