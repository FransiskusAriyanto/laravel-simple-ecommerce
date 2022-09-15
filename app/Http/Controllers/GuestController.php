<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class GuestController extends Controller
{
    public function index()
    {
        $collection = Product::latest()->get();
        return view('guest.index')->with('collection', $collection);
    }
    public function show(Product $product)
    {
        return view('guest.show', compact('product'));
    }
    public function search(Request $request)
    {
        if($request->has('search')){
            $collection = Product::where('name','LIKE','%'.$request->search.'%')->get();
        }
        return view('guest.index',['collection' => $collection]);
    }
}
