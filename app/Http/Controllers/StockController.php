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
        $this->driver = env('DB_CONNECTION');
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
        $data = $request->all();
        if ($request->hasFile('img_src')) {
            $latestUrl = $this->tempSaveToLocal($request);
            if ($latestUrl) {
                $data['image'] = $latestUrl;
            }
        }
        $this->stock->fill($data)->save();
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
        $data = $request->all();

        if ($request->hasFile('img_src')) {
            $this->deleteUploadcare($id);
            $latestUrl = $this->tempSaveToLocal($request);
            if ($latestUrl) {
                $data['image'] = $latestUrl;
            }
        }
        $stock = $this->stock->find($id)
            ->update($data);
        return redirect()->route('stock.index');
    }

    public function destroy($id)
    {
        $stock = $this->stock->find($id)->delete();
        return redirect()->route('stock.index');
    }

    public function getMotor(Request $request)
    {

        if ($this->driver == "pgsql") {
            $like = "ilike";
        } else {
            $like = "like";
        }
        if (isset($request->search)) {
            $results = Stock::orWhere('name', $like, '%' . $request->search . '%')->where('type', 'motor')->get();
        } else {
            $results = Stock::where('type', 'motor')->get();
        }
        $check = ['completed', 'on-going', 'wishlist'];
        $items = [];
        foreach ($results as $v) {
            // if ($v->order()->first()) {
            //     $order = $v->order()->first();
            //     if (in_array($order->status, $check)) {
            //         continue;
            //     }
            // }
            $items[] = $v;
        }
        return view('modules.cart.search', compact('items', 'check'));
    }

    public function getParts(Request $request)
    {

        if ($this->driver == "pgsql") {
            $like = "ilike";
        } else {
            $like = "like";
        }
        if (isset($request->search)) {
            $results = Stock::orWhere('name', $like, '%' . $request->search . '%')->where('type', 'part')->get();
        } else {
            $results = Stock::where('type', 'part')->get();
        }
        $check = ['completed', 'on-going', 'wishlist'];
        $items = [];
        foreach ($results as $v) {
            if ($v->order()->first()) {
                $order = $v->order()->first();
                if (in_array($order->status, $check)) {
                    continue;
                }
            }
            $items[] = $v;
        }

        return view('modules.cart.search', compact('items'));
    }

    private function tempSaveToLocal($request)
    {
        $file = $request->file('img_src');
        // $orig = $file->getClientOriginalName();
        // $getType = explode('.', $orig);
        // $name = $this->generateRandomString() . "." . $getType[1];
        // $file->move("images/", $name);
        // $loc = public_path('images/' . $name);
        $loc = $file->getPathName();
        $latestUrl = $this->uploadFromPath($loc, $file->getMimeType());
        return $latestUrl;
    }

    private function uploadFromPath($filePath, $name)
    {
        $api = new \Uploadcare\Api(env('UC_PLACES_PUBLIC'), env('UC_PLACES_SECRET'));
        try {
            $file = $api->uploader->fromPath($filePath, $name);
            $file->store();
        } catch (\Exception $e) {
            return null;
        }

        return $file->getUrl();
    }

    private function deleteUploadcare($id)
    {
        $image = Stock::find($id);
        $get_id = explode('/', $image->image);
        if (!isset($get_id[1])) {
            return null;
        }
        if ($get_id[1] !== "ucarecdn.com") {
            return null;
        }
        $image_id = $get_id[sizeof($get_id) - 2];
        $api = new \Uploadcare\Api(env('UC_PLACES_PUBLIC'), env('UC_PLACES_SECRET'));
        $file = $api->getFile($image_id);
        $file->delete();
        return null;
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getClick(Request $request)
    {
        return Stock::find($request->id);
    }
}
