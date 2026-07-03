<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Redirect buyer ke halaman marketplace
     */
    public function index()
    {
        return redirect()->route('buyer.marketplace');
    }

    /**
     * Menampilkan semua produk
     */
    public function marketplace(Request $request)
    {
        $query = Product::with(['category', 'seller']);

        // Search berdasarkan nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('buyer.marketplace', compact('products'));
    }

    /**
     * Detail produk
     */
    public function show(Product $product)
    {
        return view('buyer.show', compact('product'));
    }
}