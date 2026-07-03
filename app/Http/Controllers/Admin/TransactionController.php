<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'buyer',
            'items.product.seller'
        ])
        ->latest()
        ->paginate(10);

        return view('admin.transactions.index', compact('orders'));
    }
}