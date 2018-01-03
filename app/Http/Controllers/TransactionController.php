<?php

namespace App\Http\Controllers;

use App\Order;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transaction;

    public function __construct(Transaction $transaction, Order $order)
    {
        $this->transaction = $transaction;
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->get();
        return view('modules.transaction.index', compact('orders'));
    }

    public function create()
    {
        return view('modules.transaction.create');
    }

    public function store(Request $request)
    {
        $this->transaction->save($request->all());
        return redirect()->route('transaction.index');
    }

    public function show($id)
    {
        $transaction = $this->transaction->find($id);
        return view('modules.transaction.show', compact('transaction'));
    }

    public function edit($id)
    {
        $order = $this->order->find($id);
        return view('modules.transaction.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $transaction = $this->transaction->find($id)
            ->update($request->all());
        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $transaction = $this->transaction->find($id)->delete();
        return redirect()->route('transaction.index');
    }
}
