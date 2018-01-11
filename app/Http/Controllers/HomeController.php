<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\Transaction;

class HomeController extends Controller
{
    protected $stock;
    public function __construct(Stock $stock)
    {
        $this->middleware('auth');
        $this->stock = $stock;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $stock_count = $this->stock->count();
        $order_count = Order::count();
        $transaction_count = Transaction::count();
        return view('dashboard', compact('stock_count', 'order_count', 'transaction_count'));
    }

    public function cart()
    {
        $xx = \Auth::user()->orders()->get()->toArray();
        $orders = [];
        foreach ($xx as $key => $order) {
            $stock = $this->stock->where('id', $order['stock_id'])->first()->toArray();
            $orders[$key] = $stock;
            $x = array(
                'status' => $order['status'],
                'order_id' => $order['id'],
            );
            $orders[$key] = array_merge($orders[$key], $x);
        }
        return view('modules.cart.index', compact('orders'));
    }
}
