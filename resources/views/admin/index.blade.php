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
<li class="nav-item"><a href="/admin" class="active"> User Request</a></li>
<li class="nav-item"><a href="/admin/data/petani"> Petani</a></li>
<li class="nav-item"><a href="/admin/data/user">Semua User </a></li>
@endsection

@section('acccontent')
<br>
<br>
<br>

<table id="example1" class="table table-bordered table-striped pt-3" style="background-color: #fff;">
    <thead>
        <tr>
            <th></th>
            <th>Nama User</th>
            <th>Alamat User</th>
            <th>Kontak User</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($collection as $userreq)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{($userreq->user->name)}}</td>
            <td>{{($userreq->user->address)}}</td>
            <td>{{($userreq->user->contact)}}</td>
            <td>
                <form action="/type/update/{{$userreq->user->id}}" method="post" class="d-inline">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="type" value="{{$userreq->user->type}}">
                    <input type="hidden" name="ida" value="{{$userreq->user_id}}">
                    <input type="hidden" name="idb" value="{{$userreq->id}}">
                    <input type="hidden" name="status" value="{{$userreq->status}}">
                    <button type="submit" class="btn editproduct" onclick="return confirm('Yakin Ingin Konfirmasi Request?')">
                        <i class="fas fa-edit">
                        </i>
                            Konfirmasi
                    </button>
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
        </tr>
    @endforeach
    </tbody>
</table>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection