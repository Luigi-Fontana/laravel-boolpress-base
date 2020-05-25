@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>{{$user->name}}</h2>
                <p>{{$user->email}}</p>
                <div class="row">
                    <div class="col-4">
                        <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.index')}}">Visualizza tutti</a></button>
                        <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.edit', $user->id)}}">Modifica</a></button>
                        <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger m-1">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
