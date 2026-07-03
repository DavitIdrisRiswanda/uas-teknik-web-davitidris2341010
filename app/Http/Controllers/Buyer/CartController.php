<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Tambah ke Keranjang
     */
    public function add(Product $product)
    {
        $cart = Cart::firstOrCreate([
            'buyer_id' => auth()->id(),
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {

            $item->increment('qty');

        } else {

            CartItem::create([
                'cart_id'    => $cart->id,
                'product_id' => $product->id,
                'qty'        => 1,
            ]);

        }

        return redirect()
            ->route('buyer.cart')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    /**
     * Keranjang
     */
    public function index()
    {
        $cart = Cart::with('items.product.category')
            ->where('buyer_id', auth()->id())
            ->first();

        return view('buyer.cart', compact('cart'));
    }

    /**
     * Halaman Checkout
     */
    public function checkoutForm()
    {
        $cart = Cart::with('items.product.category')
            ->where('buyer_id', auth()->id())
            ->first();

        if (!$cart || $cart->items->count() == 0) {

            return redirect()
                ->route('buyer.cart')
                ->with('error', 'Keranjang masih kosong.');

        }

        return view('buyer.checkout', compact('cart'));
    }

    /**
     * Proses Checkout
     */
    public function checkout(Request $request)
{
    $request->validate([

        'receiver_name'    => 'required|string|max:255',
        'receiver_phone'   => 'required|string|max:20',
        'receiver_address' => 'required|string',
        'city'             => 'required|string|max:100',
        'province'         => 'required|string|max:100',
        'postal_code'      => 'required|string|max:10',

        'shipping_method'  => 'required|string',
        'shipping_cost'    => 'required|numeric',

        'payment_method'   => 'required|string',

        'notes'            => 'nullable|string',

    ]);

    $cart = Cart::with('items.product')
        ->where('buyer_id', auth()->id())
        ->first();

    if (!$cart || $cart->items->isEmpty()) {

        return redirect()
            ->route('buyer.cart')
            ->with('error', 'Keranjang masih kosong.');

    }

    $subtotal = 0;

    foreach ($cart->items as $item) {

        if ($item->qty > $item->product->stock) {

            return redirect()
                ->route('buyer.cart')
                ->with(
                    'error',
                    'Stok produk '.$item->product->name.' tidak mencukupi.'
                );

        }

        $subtotal += $item->qty * $item->product->price;

    }

    $shippingCost = (int) $request->shipping_cost;

    $total = $subtotal + $shippingCost;

    $order = Order::create([

        'buyer_id' => auth()->id(),

        'receiver_name'    => $request->receiver_name,
        'receiver_phone'   => $request->receiver_phone,
        'receiver_address' => $request->receiver_address,
        'city'             => $request->city,
        'province'         => $request->province,
        'postal_code'      => $request->postal_code,

        'shipping_method'  => $request->shipping_method,
        'shipping_cost'    => $shippingCost,

        'payment_method'   => $request->payment_method,

        'notes'            => $request->notes,

        'total'            => $total,

        'status'           => 'pending',

    ]);

    foreach ($cart->items as $item) {

        OrderItem::create([

            'order_id'   => $order->id,
            'product_id' => $item->product_id,
            'qty'        => $item->qty,
            'price'      => $item->product->price,

        ]);

        $item->product->decrement('stock', $item->qty);

    }

    $cart->items()->delete();

    return redirect()
        ->route('buyer.orders')
        ->with('success', 'Pesanan berhasil dibuat.');
}
    /**
     * Riwayat Pesanan
     */
    public function orders()
    {
        $orders = Order::with('items.product')
            ->where('buyer_id', auth()->id())
            ->latest()
            ->get();

        return view('buyer.orders', compact('orders'));
    }

    /**
     * Profil
     */
    public function profile()
    {
        return view('buyer.profile');
    }
}