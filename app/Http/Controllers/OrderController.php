<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Mengembalikan semua order dalam format JSON
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|unique:orders',
            'customer_id' => 'required',
            'order_date' => 'required|date',
            'total_amount' => 'required|integer',
            'status' => 'required'
        ]);
        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted']);
    }
}