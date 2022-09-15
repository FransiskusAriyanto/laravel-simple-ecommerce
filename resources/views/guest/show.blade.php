@extends('layouts.layout')
@section('title')
produk {{$product->name}}
@endsection

@section('home')
<a href="/">Rempah</a>
@endsection
@section('search')
<li class="w-100 d-flex">
    <form class="d-flex" action="/search" style="justify-content: center; margin:auto;" method="GET">
        <input class="form-control me-2 rounded-pill" name="search" style="border: 1px solid #333;" type="search" placeholder="Search" aria-label="Search">
        <button style="border: none; background:none;">
            <i class="fas fa-search"></i>
        </button>
    </form>
</li>
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('content')
<div class="row" style="padding-top: 80px; justify-content: center;">
        <div class="col-5 pb-2">
            <div class="mainproduk" style="background-color: #fff; padding: 5;">
            <a>
                <img src="/storage/{{$product->image}}" class="w-100 p-2" style="border-bottom: 1px solid #ccc;">
                <div class="pt-2">Nama Produk : <b> {{$product->name}} </b></div>
                <div class="pt-2">Stok Produk : <b> {{$product->stock}} </b></div>
                <div class="pt-2">Rp<b> {{$product->price}} </b></div>
            </a>
            <div class="p-2">
                <input type="number" id="jumlah" name="jumlah" min="1" max="{{$product->stock}}">
                <a href="/login"><button class="btn editproduct"> Pesan Produk </button></a>
            </div>
            
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection