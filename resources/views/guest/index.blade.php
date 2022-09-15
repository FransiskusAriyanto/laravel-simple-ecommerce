@extends('layouts.layout')
@section('home')
<a href="/">{{ config('app.name') }}</a>
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
@section('content')
<br>
<br>
<br>

<div class="row pt-3" style="justify-content: center;">
    @foreach($collection as $product)
    <div class="col-4 pb-2">
        <div class="mainproduk" style="background-color: #fff; padding: 3;">
            <a href="detail/{{$product->id}}">
                <img src="/storage/{{$product->image}}" class="w-100 p-2" style="border-bottom: 1px solid #ccc;">
                <div class="p-2">{{$product->name}}</div>
                <div class="p-2">Rp<b> {{ number_format($product->price)}} </b></div>
            </a>
        </div>
    </div>
    @endforeach
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection