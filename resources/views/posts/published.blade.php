@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.index')}}">Visualizza tutti</a></button>
                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.create')}}">Inserisci</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>Riassunto</th>
                        <th>Pubblicato</th>
                        <th>Azioni</th>
                    </thead>
                    <tbody>
                    @foreach ($postsPublished as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->author}}</td>
                            <td>{{$post->summary}}</td>
                            <td>
                                @if ($post->published == 1)
                                    SI
                                @elseif ($post->published == 0)
                                    NO
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.show', $post->slug)}}">Visualizza</a></button>
                                <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.edit', $post)}}">Modifica</a></button>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
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
