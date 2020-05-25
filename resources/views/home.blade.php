@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <button type="button" class="btn btn-sm btn-warning m-3"><a href="{{route('welcome')}}">Torna alla Pagina di Benvenuto</a></button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="m-2">You are logged in as admin!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.index')}}">Gestisci Utenti</a></button>
                            <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.index')}}">Gestisci Post</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
