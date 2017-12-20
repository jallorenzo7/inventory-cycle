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
        $this->stock->save($request->all());
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
        $stock = $this->stock->find($id)
            ->update($request->all());
        return redirect()->route('stock.index');
    }

    public function destroy($id)
    {
        $stock = $this->stock->find($id)->delete();
        return redirect()->route('stock.index');
    }
}
