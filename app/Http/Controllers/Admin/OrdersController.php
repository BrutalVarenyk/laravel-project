<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'status', 'products'])
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('admin/orders/index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $products = $order->products()->get();
        return view('admin/orders/{order}/edit', compact('order', 'products'));
    }
}
