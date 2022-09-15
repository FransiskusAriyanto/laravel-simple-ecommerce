<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Product $product)
    {
        return view('user.show', compact('product'));
    }
    public function store(Product $product)
    {
        $data = request()->validate([
            'product_id' => 'required',
            'xd' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $stock = $product->stock - $data['quantity'];
        Product::where('id', $product->id)->update([
            'stock' => $stock,
        ]);
        $tp = $data['quantity'] * $data['price'];
        auth()->user()->transaction()->create([
            'product_id' => $data['product_id'],
            'farmer_id' => $data['xd'],
            'quantity' => $data['quantity'],
            'price' => $tp,
        ]);
        return redirect('/beranda');
    }
    public function transaction()
    {
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->latest()->get();
        return view('user.transaction')->with('collection', $collection);
    }
    public function process()
    {
        $status = 0;
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->where('status', $status)->latest()->get();
        return view('user.inprocess')->with('collection', $collection);
    }
    public function send()
    {
        $status = 1;
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->where('status', $status)->latest()->get();
        return view('user.send')->with('collection', $collection);
    }
    public function finish()
    {
        $status = 2;
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->where('status', $status)->latest()->get();
        return view('user.finish')->with('collection', $collection);
    }
    public function reqfarm()
    {
        return view('user.req');
    }
    public function search(Request $request)
    {
        if($request->has('search')){
            $collection = Product::where('name','LIKE','%'.$request->search.'%')->get();
        }
        return view('user.index',['collection' => $collection]);
    }
}
