@extends('layouts.acccontent')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@section('title')
{{Auth()->user()->name}}
@endsection

@section('home')
<a href="/admin">Admin {{ config('app.name') }}</a>
@endsection

@section('account')
<a href="/admin">{{Auth()->user()->name}}</a>
@endsection

@section('submenu')
<li class="nav-item"><a href="/admin"> User Request</a></li>
<li class="nav-item"><a href="/admin/data/petani"> Petani</a></li>
<li class="nav-item"><a href="/admin/data/user" class="active">Semua User </a></li>
@endsection

@section('acccontent')
<br>
<br>
<br>

<table class="table pt-3" style="background-color: #fff;">
    <thead>
        <tr>
            <th></th>
            <th>Nama User</th>
            <th>Alamat User</th>
            <th>Kontak User</th>
            <th>User Type</th>
            <th style="width: 250px;"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($collection as $user)
        <tr>
            @if($user->type == Auth()->user()->type )
                
            @else
            <th scope="row" style="border-right: 1px solid #ccc;">{{$loop->iteration}}</th>
            <td>{{($user->name)}}</td>
            <td>{{($user->address)}}</td>
            <td>{{($user->contact)}}</td>
            <td >{{($user->type)}}</td>
            <td>
            <form action="#" method="post" class="d-inline">
                @method('patch')
                @csrf
                <a class="btn editproduct" href="#"  onclick="return confirm('Yakin Ingin Konfirmasi Request?')">
                    <i class="fas fa-edit">
                    </i>
                    Konfirmasi
                </a>
            </form>
            <form action="#" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn editproduct" onclick="return confirm('Yakin Ingin Tolak Request?')">
                    <i class="fas fa-trash">
                    </i>
                    Hapus
                </button>
            </form>
            </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection