<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
/*
Route::get('/', function () {
    return view('layout.app');
});
*/

Route::get('blog/admin/cadastrar', 'Admin\AdminController@index')->name('cadastrar.noticia');
Route::get('blog/admin/listar-noticias', 'Admin\AdminController@listarNoticias')->name('listar.noticias');
Route::post('deletar', 'Admin\AdminController@deletar')->name('deletar.noticia');
Route::post('blog/admin/show-form-alterar', 'Admin\AdminController@showFormAlterar')->name('showForm.noticia');
Route::post('blog/admin/alterar', 'Admin\AdminController@alterar')->name('alterar.noticia');
Route::get('blog/noticias', 'Blog\BlogController@index')->name('blog.noticias');
Route::post('blog/admin/salvar', 'Admin\AdminController@salvar')->name('salvar.noticia');
Route::get('blog/noticia/{id}', 'Blog\BlogController@buscarNoticia')->name('buscar.noticia');
