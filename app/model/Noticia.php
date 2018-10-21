<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model {

    protected $fillable = ['titulo', 'conteudo', 'categoria', 'autor', 'palavras_chave'];

}
