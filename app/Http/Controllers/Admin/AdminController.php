<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\Noticia;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller {

    private $noticia;

    public function index() {
        return view('admin.cadastrar-noticia', ['label' => 'Salvar Notícia', 'id' => 'salvar']);
    }

    public function salvar(Request $request) {

        $rules = [
            'titulo' => 'required',
            'conteudo' => 'required',
            'categoria' => 'required',
            'autor' => 'required',
            'palavras_chave' => 'required'
        ];

        $validador = Validator::make($request->all(), $rules);

        if ($validador->fails()) {
            return response()->json(['errors' => 'Campos invalidos! Preencha todos os campos!']);
        } else {
            $this->noticia = new Noticia($request->all());
            $this->noticia->save();

            return response()->json('Notícia cadastrada com sucesso!');
        }
    }

    public function listarNoticias() {

        $listarNoticias = Noticia::paginate(10);
        return view('admin.listar-noticias', ['listarNoticias' => $listarNoticias]);
        
    }

    public function paginacao(Request $request) {

        if ($request->ajax()) {
            $listarNoticias = Noticia::paginate(10);
            return view('admin.paginacao', ['listarNoticias' => $listarNoticias])->render();
        }
    }

    public function deletar(Request $request) {

        $this->noticia = Noticia::find($request->id);
        $this->noticia->delete();

        return response()->json('Notícia deletada com sucesso!');
    }

    public function showFormAlterar(Request $request) {
        $this->noticia = Noticia::find($request->id);
        return view('admin.cadastrar-noticia', ['noticia' => $this->noticia, 'label' => 'Alterar Notícia', 'id' => 'alterar']);
    }

    public function alterar(Request $request) {

        $rules = [
            'titulo' => 'required',
            'conteudo' => 'required',
            'categoria' => 'required',
            'autor' => 'required',
            'palavras_chave' => 'required'
        ];

        $validador = Validator::make($request->all(), $rules);

        if ($validador->fails()) {
            return response()->json(['errors' => 'Campos invalidos! Preencha todos os campos!']);
        }

        $this->noticia = Noticia::find($request->id);
        $this->noticia->update($request->all());

        return response()->json('Notícia alterada com sucesso!');
    }

}
