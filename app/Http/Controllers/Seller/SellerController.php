<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function index()
    {
        $sellerId = auth()->id();

        $totalProduk = Product::where('seller_id', $sellerId)->count();

        $totalPesanan = Order::whereHas('items.product', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId);
        })->count();

        $pending = Order::where('status', 'pending')
            ->whereHas('items.product', function ($query) use ($sellerId) {
                $query->where('seller_id', $sellerId);
            })
            ->count();

        $pendapatan = OrderItem::whereHas('product', function ($query) use ($sellerId) {

                $query->where('seller_id', $sellerId);

            })

            ->whereHas('order', function ($query) {

                $query->whereIn('status', [
                    'paid',
                    'shipped',
                    'completed'
                ]);

            })

            ->select(DB::raw('SUM(qty * price) as total'))

            ->value('total') ?? 0;

        $penjualanBulanIni = OrderItem::whereHas('product', function ($query) use ($sellerId) {

                $query->where('seller_id', $sellerId);

            })

            ->whereHas('order', function ($query) {

                $query->whereIn('status', [
                    'paid',
                    'shipped',
                    'completed'
                ])

                ->whereMonth('created_at', now()->month)

                ->whereYear('created_at', now()->year);

            })

            ->select(DB::raw('SUM(qty * price) as total'))

            ->value('total') ?? 0;

        $orders = Order::with(['buyer','items.product'])

            ->whereHas('items.product', function ($query) use ($sellerId) {

                $query->where('seller_id',$sellerId);

            })

            ->latest()

            ->take(5)

            ->get();

        $produkTerlaris = Product::where('seller_id',$sellerId)

            ->withSum('orderItems as total_terjual','qty')

            ->orderByDesc('total_terjual')

            ->take(5)

            ->get();

        $salesChart = [];

        for($i=1;$i<=12;$i++){

            $salesChart[] = OrderItem::whereHas('product', function ($query) use ($sellerId){

                    $query->where('seller_id',$sellerId);

                })

                ->whereHas('order', function ($query) use ($i){

                    $query->whereIn('status',[
                        'paid',
                        'shipped',
                        'completed'
                    ])

                    ->whereMonth('created_at',$i)

                    ->whereYear('created_at',now()->year);

                })

                ->select(DB::raw('SUM(qty * price) as total'))

                ->value('total') ?? 0;

        }

        return view('seller.dashboard', compact(

            'totalProduk',
            'totalPesanan',
            'pending',
            'pendapatan',
            'penjualanBulanIni',
            'orders',
            'produkTerlaris',
            'salesChart'

        ));
    }

    public function profile()
    {
        $sellerId = auth()->id();

        $totalProduk = Product::where('seller_id', $sellerId)->count();

        $totalPesanan = Order::whereHas('items.product', function ($query) use ($sellerId) {

            $query->where('seller_id', $sellerId);

        })->count();

        $pendapatan = OrderItem::whereHas('product', function ($query) use ($sellerId) {

                $query->where('seller_id', $sellerId);

            })

            ->whereHas('order', function ($query) {

                $query->whereIn('status', [
                    'paid',
                    'shipped',
                    'completed'
                ]);

            })

            ->select(DB::raw('SUM(qty * price) as total'))

            ->value('total') ?? 0;

        return view('seller.profile', compact(

            'totalProduk',
            'totalPesanan',
            'pendapatan'

        ));
    }
}