<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;

class OrderItemController extends Controller
{
    // ...existing code...

    public function destroy($order_id, $id)
    {
        $item = OrderItem::where('order_id', $order_id)->where('id', $id)->firstOrFail();
        $subtotal = $item->price * $item->quantity;

        $order = Order::where('order_id', $order_id)->first();
        if ($order) {
            $order->total_amount -= $subtotal;
            $order->save();
        }

        $item->delete();

        return response()->json(['message' => 'Order item berhasil dihapus']);
    }
}