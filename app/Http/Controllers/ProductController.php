<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('farmer.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->product()->create([
            'name' => $data['name'],
            'stock' => $data['stock'],
            'price' => $data['price'],
            'image' => $imagePath,
        ]);
        return redirect('/petani');
    }
    public function product()
    {
        $user = auth()->user()->product()->pluck('products.user_id');
        $collection = Product::wherein('user_id', $user)->latest()->get();
        return view('farmer.product')->with('collection', $collection);
    }
    public function edit(Product $product)
    {
        return view('farmer.edit', compact('product'));
    }
    public function imgedit(Product $product)
    {
        return view('farmer.imgedit', compact('product'));
    }

    public function update(Product $product)
    {
        $data = request()->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        Product::where('id', $product->id)->update($data);

        return redirect('/petani/produk');
    }
    public function imgupdate(Product $product)
    {
        $data = request()->validate([
            'image' => 'required',
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        Product::where('id', $product->id)->update([
            'image' => $imagePath
        ]);

        return redirect('/petani/produk');   
    }
}
