<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->all();
        return view('modules.order.index', compact('orders'));
    }

    public function create()
    {
        return view('modules.order.create');
    }

    public function store(Request $request)
    {
        $this->order->save($request->all());
        return redirect()->route('order.index');
    }

    public function show($id)
    {
        $order = $this->order->find($id);
        return view('modules.order.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->order->find($id);
        return view('modules.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = $this->order->find($id)
            ->update($request->all());
        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        $order = $this->order->find($id)->delete();
        return redirect()->route('cart');
    }
}
