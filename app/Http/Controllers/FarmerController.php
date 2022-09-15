<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    public function show(Product $product)
    {
        return view('farmer.show', compact('product'));
    }
    public function send(Transaction $transaction)
    {
        $stock = $transaction->product->stock - $transaction->quantity;
        Product::where('id', $transaction->product_id)->update([
            'stock' => $stock,
        ]);
        $status = 1;
        Transaction::where('id', $transaction->id)->update([
            'status' => $status,
        ]);
        return redirect('/pesanan/dikirim');
    }
    public function finish(Transaction $transaction)
    {
        $data = request()->validate([
            'status' => 'required',
        ]);
        $status = 2;
        Transaction::where('id', $transaction->id)->update([
            'status' => $status,
        ]);
        return redirect('/pesanan/dikirim');
    }
    public function search(Request $request)
    {
        if($request->has('search')){
            $collection = Product::where('name','LIKE','%'.$request->search.'%')->get();
        }
        return view('farmer.index',['collection' => $collection]);
    }
    public function transaction()
    {
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->latest()->get();
        return view('farmer.transaction.all')->with('collection', $collection);
    }
    public function transactioninprocess()
    {
        $status = 0;
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->where('status', $status)->latest()->get();
        return view('farmer.transaction.inprocess')->with('collection', $collection);
    }
    public function transactionsend()
    {
        $status = 1;
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->where('status', $status)->latest()->get();
        return view('farmer.transaction.send')->with('collection', $collection);
    }
    public function transactionfinish()
    {
        $status = 2;
        $user = auth()->user()->transaction()->pluck('transactions.user_id');
        $collection = Transaction::wherein('user_id', $user)->where('status', $status)->latest()->get();
        return view('farmer.transaction.finish')->with('collection', $collection);
    }
}
