@extends('layout.app')

@section('title', 'Lista de Notícias')

@section('content')
<a href="{{route('cadastrar.noticia')}}" class="btn btn-outline-secondary" role="button" aria-pressed="true">Cadastrar</a>
<a href="{{route('blog.noticias')}}" class="btn btn-outline-secondary" style="margin-left: 10px" >Voltar</a>

<div class="table-responsive" style="margin-top: 20px">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Alterar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listarNoticias as $noticia)
            <tr>
                <td>{{$noticia->id}}</td>
                <td>{{$noticia->titulo}}</td>
                <td>{{$noticia->autor}}</td>
                <td>{{$noticia->categoria}}</td>
                <td>
                    <form method="post" action="{{route('showForm.noticia')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$noticia->id}}">
                        <button type="submit" class="btn btn-outline-primary">
                            Alterar
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{route('deletar.noticia')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$noticia->id}}">
                        <button type="submit" class="btn btn-outline-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if(session('status'))
<div class="alert alert-success" role="alert" style="margin-top: 20px">
    {{session('status')}}
</div>
@endif
@endsection