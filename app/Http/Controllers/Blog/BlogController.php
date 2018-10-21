<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\model\Noticia;

class BlogController extends Controller {

    public function index() {

        $listaDeNoticias = Noticia::all();
        return view('blog.noticias', ['listaDeNoticias' => $listaDeNoticias]);
    }

    public function buscarNoticia($id) {

        $notiica = Noticia::find($id);
        return view('blog.noticia', ['noticia' => $notiica]);
    }

}
