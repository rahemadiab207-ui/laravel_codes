<?php

namespace App\Http\Controllers;

use App\Models\Order_items;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = Order_items::with(['order', 'product'])->get();
        return view('orders.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $orderItems=Order_items::all();
        return view('orders.create',compact('orderItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // findOrFail ===> exit==> data || not exist : 404
        $order=Order_items::findOrFail($id);
        // var_dump($order);
                return view('orders.show',compact('order'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order_items $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order_items $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order_items $order)
    {
        //
    }
}