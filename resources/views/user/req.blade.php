@extends('layouts.layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
<a href="/transaksi">{{Auth()->user()->name}}</a>
@endsection
@section('reqfarm')
<a href="/daftar/jadi/petani">Daftarkan Toko</a>
@endsection

@section('content')
<br>
<br>
<br>

<div class="row pt-3">
    <div class="col-12 pb-2">
        <div class="p-2" style="background-color: #fff;">
            <form action="/req/{{Auth()->user()->id}}" method="post">
                @csrf
                    <label for="name" class="form-label" style="font-weight: bold;">Yakin Ingin Daftar Menjadi Petani? </label>

                    <div class="p-2">
                        <button class="btn editproduct" type="submit">Daftar Jadi Petani</button>
                    </div>
            </form>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection