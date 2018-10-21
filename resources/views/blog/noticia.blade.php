@extends('layout.app')

@section('title', 'Notícia')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{$noticia->titulo}}</h1>
        <p class="lead text-muted">{{$noticia->conteudo}}</p>
    </div>
</section>
<p>Autor: {{$noticia->autor}}</p>
@endsection

@section('link')
<p class="float-right">
    <a href="{{route('blog.noticias')}}" class="btn btn-outline-secondary">Voltar</a>
</p>
@endsection