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
<li class="nav-item"><a href="/create"> Unggah Produk</a></li>
<li class="nav-item"><a href="/petani/produk"> Produk</a></li>
<li class="nav-item"><a href="/pesanan/baru" class="active"> Pesanan Baru</a></li>
<li class="nav-item"><a href="/pesanan/dikirim"> Pesanan Dikirim </a></li>
<li class="nav-item"><a href="/pesanan/selesai"> Pesanan Selesai</a></li>
@endsection

@section('acccontent')
@foreach($collection as $transaction)
<div class="col-4 pb-3">
    <div class="mainproduk" style="background-color: #fff; padding: 3;">
        <img src="/storage/{{$transaction->product->image}}" class="w-100 p-2">
        <div class="p-2">Nama Produk : {{$transaction->product->name}}</div>
        <div class="p-2" style="border-bottom: 1px solid #ccc">Produk Tersedia : {{$transaction->product->stock}}</div>
        <div class="p-2">Jumlah Pesanan : {{$transaction->quantity}}</div>
        <div class="p-2">Nama Pemesan : {{$transaction->user->name}}</div>
        <div class="p-2">Alamat : {{$transaction->user->address}}</div>
        <div class="p-2">HP : {{$transaction->user->contact}}</div>
        <div class="p-2">Rp<strong> {{ number_format($transaction->price)}} </strong></div>
        <div class="p-2" style="border-bottom: 1px solid #ccc; box-shadow: 0px 5px 10px -10px #2d3876;">Status Pesanan : <strong> {{$transaction->status}} </strong></div>
        <div class="p-2">
            <form action="/send/{{$transaction->id}}" method="POST">
                @method('patch')
                @csrf
                    <input type="hidden" id="status" name="status" value="1">
                    <button class="btn editproduct" type="submit"> Kirim Pesanan </button>
            </form>
        </div>
        
    </div>
</div>
@endforeach
@endsection