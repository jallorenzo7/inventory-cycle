<?php

namespace App\Http\Controllers;

use App\Order;
use App\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    protected $transaction;

    public function __construct(Order $order, Transaction $transaction)
    {
        $this->order = $order;
        $this->transaction = $transaction;
    }

    public function transactionReport(Request $request)
    {
        $data = $request->all();
        $date = array(
            'from' => $data['from'],
            'to' => empty($data['to']) ? $data['from'] : $data['to'],
        );
        $transactions = $this->transaction->whereBetween('date_transaction', array($date['from'], $date['to']))->get();
        $total_amount_recevied = $transactions->sum('amount_received');

        return view('modules.transaction.report', compact('transactions', 'total_amount_recevied', 'date'));
    }

    public function transactions()
    {
        $transactions = $this->transaction->all();
        return view('modules.transaction.index', compact('transactions'));
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
