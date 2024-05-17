<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Dictionaries\OrderStatus;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('owner')->get();
        
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = OrderStatus::statuses();
        
        return view('orders.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status_id' => $request->status_id,
            'comment' => $request->comment
        ]);
        
        $order->products()->attach($request->products);

        return redirect()->route('orders.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('products');

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $statuses = OrderStatus::statuses();

        return view('orders.edit', compact('order', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'user_id' => auth()->user()->id,
            'status_id' => $request->status_id,
            'comment' => $request->comment
        ]);
        
        return redirect()->route('orders.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();

        return redirect()->route('orders.index');

    }
}
