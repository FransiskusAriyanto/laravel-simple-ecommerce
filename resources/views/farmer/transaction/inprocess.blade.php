@extends('layouts.acccontent')

@section('home')
<a href="/petani">{{ config('app.name') }}</a>
@endsection

@section('search')
<li class="w-100 d-flex">
    <form class="d-flex" action="/petani/search" style="justify-content: center; margin:auto;" method="GET">
        <input class="form-control me-2 rounded-pill" name="search" style="border: 1px solid #333;" type="search" placeholder="Search" aria-label="Search">
        <button style="border: none; background:none;">
            <i class="fas fa-search"></i>
        </button>
    </form>
</li>
@endsection

@section('account')
<a href="/pesanan/baru">{{Auth()->user()->name}}</a>
@endsection

@section('submenu')
<li class="nav-item"><a href="/transaksi/anda"> Transaksi Anda </a></li>
<li class="nav-item"><a href="/transaksi/diproses" class="active"> Diproses</a></li>
<li class="nav-item"><a href="/transaksi/dikirim">Dikirim </a></li>
<li class="nav-item"><a href="/transaksi/selesai">Selesai</a></li>
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
        <div class="p-2">Jumlah Pesanan : <b> {{$transaction->quantity}} </b></div>
        <div class="p-2">Rp<b> {{$transaction->price}} </b></div>
    </div>
</div>
@endforeach
@endsection