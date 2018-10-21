<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\Noticia;
use Illuminate\Http\Request;

class AdminController extends Controller {

    private $noticia;

    public function index() {
        return view('admin.cadastrar-noticia', ['label' => 'Salvar Notícia']);
    }

    public function salvar(Request $request) {
        
        $this->noticia = new Noticia($request->all());
        $this->noticia->save();

        //return redirect()->route('cadastrar.noticia')->with('status', 'Notícia cadastrada com sucesso!');
        return response()->json('Notícia cadastrada com sucesso');
    }

    public function listarNoticias() {

        $listarNoticias = Noticia::all();
        return view('admin.listar-noticias', ['listarNoticias' => $listarNoticias]);
    }

    public function deletar(Request $request) {

        $this->noticia = Noticia::find($request->id);
        $this->noticia->delete();

        return redirect()->route('listar.noticias')->with('status', 'Noticía deletada com sucesso!');
    }

    public function showFormAlterar(Request $request) {
        $this->noticia = Noticia::find($request->id);
        return view('admin.cadastrar-noticia', ['noticia' => $this->noticia, 'label' => 'Alterar Notícia']);
    }

    public function alterar(Request $request){
        
        $this->noticia = Noticia::find($request->id);
        $this->noticia->update($request->all());
        
        return redirect()->route('listar.noticias')->with('status', 'Notícia alterada com sucesso!');
    }
}
