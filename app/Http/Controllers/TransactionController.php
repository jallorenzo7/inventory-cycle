<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
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

    public function fucked($id)
    {
        $order = $this->order->find($id);
        $transactions = $order->transactions()->get();
        $price = 0;

        if ($order->transactions()->count() === 0) {
            $price = (float) $order->stock()->first()->price;
        } else {
            foreach ($transactions as $t) {
                $price = (float) $t->total;
            }
        }
        return view('modules.billing.fuck', compact('order', 'price', 'transactions'));
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

    public function billingUpdate(Request $request)
    {
        $data = $request->all();
        if (empty($data['amount_received'])) {
            return redirect()->back();
        }
        $order = $this->order->find($data['order_id']);
        $transactions = $order->transactions()->get();
        $price = 0;
        if ($order->transactions()->count() === 0) {
            $price = (float) $order->stock()->first()->price;
        } else {
            foreach ($transactions as $t) {
                $price = (float) $t->total;
            }
        }

        if ($price < (float) $data['amount_received']) {
            return redirect(url('/billing/edit/' . $data['order_id']));
        }
        if ((float) $price > (float) $data['amount_received']) {
            $order->status = "on-going";
        }

        if ((float) $price === (float) $data['amount_received']) {
            $order->status = "completed";
        }
        $order->save();
        $newTransaction = $this->transaction;
        $newTransaction->fill($data)->save();
        $order->transactions()->attach($newTransaction->id);
        return redirect(url('/billing/edit/' . $data['order_id']));

    }

    public function billingIndex()
    {
        $orders = $this->order->get();
        return view('modules.billing.index', compact('orders'));
    }

    public function billingEdit($id)
    {
        $order = $this->order->find($id);
        $transactions = $order->transactions()->get();
        $price = 0;

        if ($order->transactions()->count() === 0) {
            $price = (float) $order->stock()->first()->price;
        } else {
            foreach ($transactions as $t) {
                $price = (float) $t->total;
            }
        }
        return view('modules.billing.edit', compact('order', 'price', 'transactions'));
    }

    public function billingDiscount(Request $request)
    {
        $data = $request->all();
        $order = $this->order->find($data['order_id']);
        $transactions = $order->transactions()->get();
        $price = 0;
        if ($order->transactions()->count() === 0) {
            $price = (float) $order->stock()->first()->price;
        } else {
            foreach ($transactions as $t) {
                $price = (float) $t->total;
            }
        }
        $stock = Stock::find($data['order_id']);
        $perc = '.' . $stock->discount;
        $discounted = (float) $stock->price - ((float) $stock->price * (float) $perc);
        $data['amount_received'] = $discounted;
        $data['total'] = $discounted . " - Paid in Full - Discount - " . ((float) $stock->price * (float) $perc);
        $order->status = "completed";
        $order->save();
        $data['date_transaction'] = date('Y-m-d');
        $newTransaction = $this->transaction;
        $newTransaction->fill($data)->save();
        $order->transactions()->attach($newTransaction->id);

        return redirect(url('/billing/edit/' . $data['order_id']));

    }

}
