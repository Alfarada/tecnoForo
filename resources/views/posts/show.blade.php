@extends('layouts/app')
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>{{ $post->user->name }}</p>
    <h4>Comentarios</h4>
    <form method="post" action="{{ route('comments.store', $post) }}">
        <div class="form-group">
            <label for="comment">Agregue un comentario.</label>
            <textarea id="comment" class="form-control" name="comment" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Publicar comentario</button>
    </form>
@endsection