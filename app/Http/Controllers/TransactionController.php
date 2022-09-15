<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function new(Product $product, User $user)
    {
        $status = 0;
        $user = auth()->user()->product()->pluck('products.user_id');
        $collection = Transaction::wherein('farmer_id', $user)->where('status', $status)->latest()->get();
        return view('farmer.new', compact('product'))->with('collection', $collection);
    }
    public function onsend()
    {
        $status = 1;
        $user = auth()->user()->product()->pluck('products.user_id');
        $collection = Transaction::wherein('farmer_id', $user)->where('status', $status)->latest()->get();
        return view('farmer.onsend')->with('collection', $collection);
    }
    public function finish()
    {
        $status = 2;
        $user = auth()->user()->product()->pluck('products.user_id');
        $collection = Transaction::wherein('farmer_id', $user)->where('status', $status)->latest()->get();
        return view('farmer.finish')->with('collection', $collection);
    }
}
