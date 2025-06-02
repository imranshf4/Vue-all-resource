<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //store
    public function store(Request $request)
    {
        $items = $request->items;
        $total_price = $request->total_price;

        if (!$items || !is_array($items)) {
            return response()->json(['error' => 'Invalid cart items'], 422);
        }

        $order = Order::create([
            'user_id' => 1, // Auth::id() যদি login থাকে
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '123456789',
            'address' => 'Test Address',
            'post_code' => '12345',
            'notes' => 'Test Notes',
            'currency' => 'USD',
            'amount' => $total_price,
            'invoice_no' => 'INV' . mt_rand(1000, 9999),
            'order_date' => now()->format('Y-m-d'),
            'order_month' => now()->format('F'),
            'order_year' => now()->format('Y'),
            'status' => 'pending',
        ]);


        foreach ($items as $item) {
            OrderItem::insert([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'price' => $item['price']-($item['discount']*$item['price'])/100,
                'discount_price' => $item['price']*$item['quantity'] - ($item['discount']*$item['price']*$item['quantity'])/100,
                'discount' => $item['discount'],
                'quantity' => $item['quantity'],
                'user_id' => 1, // Auth::id()
                'created_at' => Carbon::now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json([
            'message' => 'Order placed successfully',
            'order' => $order,
            'items' => $items,
            'status' => '200'
        ], 200);
    }
}
