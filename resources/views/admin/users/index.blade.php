@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <button type="button" class="btn btn-sm btn-warning m-3"><a href="{{route('home')}}">Torna alla Dashboard</a></button>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.create')}}">Inserisci</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Azioni</th>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.show', $user->id)}}">Visualizza</a></button>
                                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('admin.users.edit', $user->id)}}">Modifica</a></button>
                                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger m-1">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
