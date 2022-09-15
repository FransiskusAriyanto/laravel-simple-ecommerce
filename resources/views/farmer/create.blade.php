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
<li class="nav-item"><a href="/create" class="active"> Unggah Produk</a></li>
<li class="nav-item"><a href="/petani/produk"> Produk</a></li>
<li class="nav-item"><a href="/pesanan/baru"> Pesanan Baru</a></li>
<li class="nav-item"><a href="/pesanan/dikirim"> Pesanan Dikirim </a></li>
<li class="nav-item"><a href="/pesanan/selesai"> Pesanan Selesai</a></li>
@endsection

@section('acccontent')
<div class="col-12 pb-2 p-3" style="background-color: #fff;">
    <form method="POST" enctype="multipart/form-data" action="/store">
    @csrf
    <div class="mb-3">

        <label for="name" class="form-label" style="font-weight: bold;">Nama Produk </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror border-3 rounded-pill" id="name" name="name" value="{{old('name')}}">
        @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror

        <label for="stock" class="form-label" style="font-weight: bold;">Jumlah Produk </label>
        <input type="text"  class="form-control @error('stock') is-invalid @enderror border-3 rounded-pill" id="stock" name="stock" value="{{old('stock')}}">
        @error('stock') <div class="invalid-feedback">{{$message}}</div>@enderror
                            
        <label for="price" class="form-label" style="font-weight: bold;">Harga Satuan </label>
        <input type="text"  class="form-control @error('price') is-invalid @enderror border-3 rounded-pill" id="price" name="price" value="{{old('price')}}">
        @error('price') <div class="invalid-feedback">{{$message}}</div>@enderror

        <label for="image" class="form-label" style="font-weight: bold;">Foto Produk </label>
        <input type="file"  class="form-control @error('image') is-invalid @enderror border-3 rounded-pill" id="image" name="image" value="{{old('image')}}">
        @error('image') <div class="invalid-feedback">{{$message}}</div>@enderror

    </div>
    <button type="submit" class="btn editproduct">Unggah</button>
    </form>
</div>
@endsection