@foreach ($posts as $post)
    <h2>{{$post->title}}</h2>
    <h3>{{$post->author}}</h3>
    <p>{{$post->body}}</p>
    <small>{{$post->created_at}}</small>
@endforeach
