@extends('layouts.app')
@section('content')
    <form action="{{route('posts.update', $post->slug)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group col-6">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" placeholder="Inserisci il titolo del Post" name="title" value="{{(!empty(old('title'))) ? old('title') : $post->title}}">
            @error('title')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="title">Autore</label>
            <input type="text" class="form-control" placeholder="Inserisci il nome dell'Autore del Post" name="author" value="{{(!empty(old('author'))) ? old('author') : $post->author}}">
            @error('author')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="title">Testo</label>
            <textarea class="form-control" rows="3" name="body">{{$post->body}}</textarea>
            @error('body')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="title">Riassunto</label>
            <textarea class="form-control" rows="2" name="summary">{{$post->summary}}</textarea>
            @error('summary')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="title">Immagine</label>
            <input type="text" class="form-control" placeholder="Inserisci l'indirizzo dell'immagine" name="img" value="{{(!empty(old('img'))) ? old('img') : $post->img}}">
            @error('img')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="true">Pubblicato</label>
            <input type="radio" id="true" name="published" value="1" {{($post->published == 1) ? 'checked' : ''}}>
            <label for="false">Non Pubblicato</label>
            <input type="radio" id="false" name="published" value="0" {{($post->published == 0) ? 'checked' : ''}}>
            @error('published')
                <span class="alert alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-6">
            <input type="submit" class="btn btn-primary" value="Salva">
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-sm btn-light m-1"><a href="{{route('posts.index')}}">Annulla Modifiche</a></button>
        </div>
    </div>
@endsection
