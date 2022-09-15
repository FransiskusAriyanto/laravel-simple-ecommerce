<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reqfarm;
use Illuminate\Http\Request;
    
class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function user()
    {
        $collection = Product::latest()->get();
        return view('user.index')->with('collection', $collection);
    }
    public function farmer()
    {
        $collection = Product::latest()->get();
        return view('farmer.index')->with('collection', $collection);
    }
    public function admin()
    {
        $status = 0;
        $collection = Reqfarm::where('status', $status)->get();
        return view('admin.index')->with('collection', $collection);
    }
}
