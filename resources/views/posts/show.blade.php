@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>{{$post->title}}</h2>
                <small>Scritto da {{$post->author}}</small>
                <p>{{$post->body}}</p>
                <img src="{{$post->img}}" alt="{{$post->title}}">
                <div class="row">
                    <div class="col-4">
                        <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.index')}}">Visualizza tutti</a></button>
                        <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.edit', $post)}}">Modifica</a></button>
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
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
