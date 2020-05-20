<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Boolpress | Create</title>
    </head>
    <body>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group col-6">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" placeholder="Inserisci il titolo del Post" name="title">
                @error('title')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="title">Autore</label>
                <input type="text" class="form-control" placeholder="Inserisci il nome dell'Autore del Post" name="author">
                @error('author')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="title">Testo</label>
                <textarea class="form-control" rows="3" name="body">Inserisci il testo del Post</textarea>
                @error('body')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="title">Riassunto</label>
                <textarea class="form-control" rows="2" name="summary">Inserisci il riassunto del Post</textarea>
                @error('summary')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="title">Immagine</label>
                <input type="text" class="form-control" placeholder="Inserisci l'indirizzo dell'immagine" name="img">
                @error('img')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="true">Pubblicato</label>
                <input type="radio" id="true" name="published" value="1">
                <label for="false">Non Pubblicato</label>
                <input type="radio" id="false" name="published" value="0">
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
                <a href="{{route('posts.index')}}">Torna all'indice</a>
            </div>
        </div>
    </body>
</html>
