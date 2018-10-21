@extends('layout.app')

@section('title', 'Lista de Notícias')

@section('content')
<a href="{{route('cadastrar.noticia')}}" class="btn btn-outline-secondary" role="button" aria-pressed="true">Cadastrar</a>
<a href="{{route('blog.noticias')}}" class="btn btn-outline-secondary" style="margin-left: 10px" >Voltar</a>

<div class="table-responsive" style="margin-top: 20px">
    <table class="table table-striped table-sm" id="tabelaNoticia">
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
            <tr class="noticia-{{$noticia->id}}">
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
                    <button type="button" class="btn btn-outline-danger deletar" data-toggle="modal" 
                            data-whatever="{{$noticia}}" data-target="#modalConfirmar">Deletar</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="mensagem" role="alert" style="margin-top: 20px">

</div>

<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <form>
                    @csrf
                    <input id="id" type="hidden" value="">
                    <button id="deletar" type="button" class="btn btn-outline-primary" data-dismiss="modal">Sim</button>
                </form>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>


@endsection