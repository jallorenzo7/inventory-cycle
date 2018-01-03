<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    protected $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function index()
    {
        $stocks = $this->stock->all();
        return view('modules.stock.index', compact('stocks'));
    }

    public function create()
    {
        return view('modules.stock.create');
    }

    public function store(Request $request)
    {
        if (empty($request->discount)) {
            $request->merge(['discount' => 0]);
        }
        if (empty($request->discount)) {
            $request->discount = 0;
        }
        $this->stock->fill($request->all())->save();
        return redirect()->route('stock.index');
    }

    public function show($id)
    {
        $stock = $this->stock->find($id);
        return view('modules.stock.show', compact('stock'));
    }

    public function edit($id)
    {
        $stock = $this->stock->find($id);
        return view('modules.stock.edit', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request->discount)) {
            $request->merge(['discount' => 0]);
        }
        $stock = $this->stock->find($id)
            ->update($request->all());
        return redirect()->route('stock.index');
    }

    public function destroy($id)
    {
        $stock = $this->stock->find($id)->delete();
        return redirect()->route('stock.index');
    }

    public function getMotor(Request $request)
    {
        if (isset($request->search)) {
            $items = Stock::orWhere('name', 'like', '%' . $request->search . '%')->where('type', 'motor')->get();
        } else {
            $items = Stock::where('type', 'motor')->get();
        }
        return view('modules.cart.search', compact('items'));
    }

    public function getParts(Request $request)
    {
        if (isset($request->search)) {
            $items = Stock::orWhere('name', 'like', '%' . $request->search . '%')->where('type', 'part')->get();
        } else {
            $items = Stock::where('type', 'part')->get();
        }
        return view('modules.cart.search', compact('items'));
    }
}
