<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function welcome()
    {
        $motors = Stock::where('quantity', '!=', '0')->where('type', 'motor')->get();
        $parts = Stock::where('quantity', '!=', '0')->where('type', 'part')->get();
        return view('welcome', compact('motors', 'parts'));
    }

    public function addOrder(Request $request)
    {
        if (empty($request->id)) {
            return response()->json(['error' => 'Bad Request'], 403);
        }
        $user = \Auth::user();
        $data = [
            'user_id' => \Auth::id(),
            'stock_id' => $request->id,
            'quantity' => 1,
            'status' => 'wishlist',
        ];
        $exist = Order::where('user_id', $data['user_id'])->where('stock_id', $data['stock_id'])->count();
        if ($exist) {
            return response()->json(['error' => 'Bad Request'], 403);
        }
        $order = new Order;
        $order->fill($data)->save();
        return response()->json($user);

    }

    public function removeOrder(Request $request)
    {
        if (empty($request->id)) {
            return response()->json(['error' => 'Bad Request'], 403);
        }
        $user = \Auth::user();
        $data = [
            'user_id' => \Auth::id(),
            'stock_id' => $request->id,
        ];
        $exist = Order::where('user_id', $data['user_id'])->where('stock_id', $data['stock_id'])->first();
        $del = Order::find($exist->id);
        $del->delete();
        return response()->json();

    }
}
