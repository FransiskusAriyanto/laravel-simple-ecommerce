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
<li class="nav-item"><a href="/petani/produk" class="active"> Produk</a></li>
<li class="nav-item"><a href="/pesanan/baru"> Pesanan Baru</a></li>
<li class="nav-item"><a href="/pesanan/dikirim"> Pesanan Dikirim </a></li>
<li class="nav-item"><a href="/pesanan/selesai"> Pesanan Selesai</a></li>
@endsection

@section('acccontent')
@foreach($collection as $products)
<div class="col-4 pb-3">
    <div class="mainproduk" style="background-color: #fff; padding: 3;">
            <a href="/petani/ubah/gambar/{{$products->id}}">
                <img src="/storage/{{$products->image}}" class="w-100 p-2"> 
                <i class="fas fa-edit p-2" style="border-bottom: 1px solid #ccc; width: 100%;">Ubah Gambar</i>
            </a>
        <div class="p-2">Nama : {{$products->name}}</div>
        <div class="p-2">Stok : {{$products->stock}}</div>
        <div class="p-2">Rp<b> {{$products->price}} </b></div>
        <a class="p-2" href="/petani/edit/{{$products->id}}"><button class="btn editproduct"> Edit </button></a>
    </div>
</div>
@endforeach
@endsection