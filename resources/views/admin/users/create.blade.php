@extends('layouts.app')
@section('content')
    <form action="{{route('admin.users.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group col-6">
            <label for="name">Nome</label>
            <input type="text" class="form-control" placeholder="Inserisci il nome Utente" name="name" value="{{old('name')}}">
            @error('name')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Inserisci l'email" name="email" value="{{old('email')}}">
            @error('email')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Inserisci la password" name="password" value="{{old('password')}}">
            @error('password')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <input type="submit" class="btn btn-primary" value="Salva">
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.index')}}">Annulla Inserimento</a></button>
        </div>
    </div>
@endsection
