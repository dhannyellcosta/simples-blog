@extends('layout.app')

@section('title', 'Lista de Notícias')

@section('content')
<a href="{{route('cadastrar.noticia')}}" class="btn btn-outline-secondary" role="button" aria-pressed="true">Cadastrar</a>
<a href="{{route('blog.noticias')}}" class="btn btn-outline-secondary" style="margin-left: 10px" >Voltar</a>

<div id="tabelaNoticia">
    @include('admin.paginacao')
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