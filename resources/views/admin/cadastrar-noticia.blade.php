@extends('layout.app')

@section('title', 'Cadatro de Notícias')

@section('content')

@if(isset($noticia))
{!! Form::model($noticia, ['route' => 'alterar.noticia', 'method' => 'post' ])!!}
<input type="hidden" name="id" value="{{$noticia->id}}"/>
@else
{!! Form::open(['route' => 'salvar.noticia', 'method' => 'post' ])!!}
@endif
<div class="form-group">
    <label for="titulo">Titulo</label>
    {!! Form::text('titulo', null, ['class' => 'form-control', 'id' => 'titulo']) !!}       
</div>
<div class="form-group">
    <label for="conteudo">Conteúdo</label>
    {!! Form::textarea('conteudo', null, ['class' => 'form-control', 'id' => 'conteudo']) !!}
</div>
<div class="form-group">
    <label for="categoria">Categoria</label>
    {!! Form::text('categoria', null, ['class' => 'form-control', 'id' => 'categoria']) !!}
</div>
<div class="form-group">
    <label for="autor">Autor</label>
    {!! Form::text('autor', null, ['class' => 'form-control', 'id' => 'autor']) !!}
</div>
<div class="form-group">
    <label for="palavras_chave">Palavras-chave</label>
    {!! Form::text('palavras_chave', null, ['class' => 'form-control', 'id' => 'palavras_chave']) !!}
</div>

<button type="button" id="salvar" class="btn btn-outline-secondary">{{$label}}</button>
<p class="float-right">
    <a href="{{route('blog.noticias')}}" class="btn btn-outline-secondary">Voltar</a>
    <a href="{{route('listar.noticias')}}" class="btn btn-outline-secondary" style="margin-left: 10px">Lista de Notícias</a>
</p>
{!! Form::close() !!}    

<div id="mensagem" role="alert" style="margin-top: 20px">
    
</div>


<!--@if(session('status'))
<div class="alert alert-success" role="alert" style="margin-top: 20px">
    {{session('status')}}
</div>
@endif-->
@endsection