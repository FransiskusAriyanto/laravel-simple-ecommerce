@extends('layouts.acccontent')

@section('title')
{{Auth()->user()->name}}
@endsection
@section('home')
<a href="/beranda">{{ config('app.name') }}</a>
@endsection

@section('search')
<li class="w-100 d-flex">
    <form class="d-flex" action="/user/search" style="justify-content: center; margin:auto;" method="GET">
        <input class="form-control me-2 rounded-pill" name="search" style="border: 1px solid #333;" type="search" placeholder="Search" aria-label="Search">
        <button style="border: none; background:none;">
            <i class="fas fa-search"></i>
        </button>
    </form>
</li>
@endsection

@section('account')
<a href="/diproses">{{Auth()->user()->name}}</a>
@endsection
@section('reqfarm')
<a href="/daftar/jadi/petani">Daftarkan Toko</a>
@endsection

@section('submenu')
<li class="nav-item"><a href="/transaksi" class="active"> Transaksi</a></li>
<li class="nav-item"><a href="/diproses"> Diproses</a></li>
<li class="nav-item"><a href="/dikirim">Dikirim </a></li>
<li class="nav-item"><a href="/selesai">Selesai</a></li>
@endsection

@section('acccontent')
@foreach($collection as $transaction)
<div class="col-4 pb-3">
    <div class="mainproduk" style="background-color: #fff; padding: 3;">
        <a href="/produk/{{$transaction->product->id}}">
            <img src="/storage/{{$transaction->product->image}}" class="w-100 p-2" >
        </a>
        <div class="p-2">Nama Produk : {{$transaction->product->name}}</div>
        <div class="p-2">Stok Tersedia : {{$transaction->product->stock}}</div>
        <div class="p-2">Jumlah Pesanan : <strong> {{$transaction->quantity}} </strong></div>
        <div class="p-2">Rp<strong> {{$transaction->price}} </strong></div>
        <div class="p-2">Status Pesanan : <strong> {{$transaction->status}} </strong></div>
    </div>
</div>
@endforeach
@endsection