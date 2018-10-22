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
            <tr class="noticia-{{$noticia->id}}">
                <td>{{$noticia->id}}</td>
                <td>{{$noticia->titulo}}</td>
                <td>{{$noticia->autor}}</td>
                <td>{{$noticia->categoria}}</td>
                <td style="width: 50px">
                    <form method="post" action="{{route('showForm.noticia')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$noticia->id}}">
                        <button type="submit" class="btn btn-outline-primary">
                            Alterar
                        </button>
                    </form>
                </td>
                <td style="width: 50px">
                    <button type="button" class="btn btn-outline-danger deletar" data-toggle="modal" 
                            data-whatever="{{$noticia}}" data-target="#modalConfirmar">Deletar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $listarNoticias->links() !!}
</div>