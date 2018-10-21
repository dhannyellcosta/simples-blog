@extends('layout.app')

@section('title', 'Notícias')

@section('content')
<div class="row">
    @foreach($listaDeNoticias as $noticia)
    <div class="col-md-4">
        <h4>{{$noticia->titulo}}</h4>
        <p class="limitarTexto">{{$noticia->conteudo}}</p>
        <p><a class="btn btn-outline-secondary" href="{{route('buscar.noticia', $noticia->id)}}" role="button">Mais »</a></p>
    </div>
    @endforeach
</div>
@endsection

@section('link')
<p class="float-right">
    <a href="#" class="btn btn-outline-secondary">Voltar para o topo</a>
</p>
@endsection