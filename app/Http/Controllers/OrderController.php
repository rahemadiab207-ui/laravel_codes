<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        $products = Product::all();

        return response()->json([
            'orders'   => $orders,
            'users'    => $users,
            'products' => $products
        ]);
    }
}