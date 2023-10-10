<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function onholdList()
    {
        $orders = Order::where('status', 0)->get();
        return view('backend.Order.onhold', compact('orders'));
    }
    public function processingList()
    {
        $orders = Order::where('status', 1)->get();

        return view('backend.Order.processing', compact('orders'));
    }
    public function CompleteList()
    {
        $orders = Order::where('status', 2)->get();

        return view('backend.Order.complete', compact('orders'));
    }


    public function processing_Status($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => '1',
        ]);
        return back()->with('success', 'Order on processing');
    }
    public function Complete_Status(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => '2',
        ]);
        return back()->with('success', 'Order deliverd  Successfully');
    }
}
