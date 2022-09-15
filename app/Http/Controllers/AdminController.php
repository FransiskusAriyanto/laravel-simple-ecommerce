<?php

namespace App\Http\Controllers;

use App\Models\Reqfarm;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userdata()
    {
        $collection = User::latest()->get();
        return view('admin.user')->with('collection', $collection);
    }
    public function farmerdata()
    {
        $type = 1;
        $collection = User::where('type', $type)->latest()->get();
        if ($collection == true) {
            return view('admin.farmer')->with('collection', $collection);
        }   
    }
    public function req()
    {
        $data =  request()->validate([

        ]);
        auth()->user()->reqfarm()->create($data);
        return redirect('/beranda');
    }
    public function typeupdate(Reqfarm $reqfarm)
    {
        $data = request()->validate([
            'ida' => 'required',
            'idb' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $type = 1;
        User::where('id', $data['ida'])->update([
            'type' => $type,
        ]);
        Reqfarm::where('id', $data['idb'])->update([
            'status' => $type,
        ]);
        return redirect('/admin');
    }
}