<?php

use Illuminate\Support\Facades\Route;

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

/* Aqui se dá o início da página web com a criacão da rota principal (index) e as demais rotas da página*/

Route::get('/', 'PrincipalController@principal')-> name('site.index');
Route::get('/sobre-nos','SobreNosController@sobreNos')-> name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')-> name('site.contato');
/*route::get('/teste', 'testeController@teste');*/
route::get('/login', function() { return 'Login';})-> name('site.login');

/* aqui será criado um grupo de rotas com o prefixo app ex: app/nome_da_rota)*/

route::prefix('/app') -> group(function() {
    route::get('/clientes', function(){return 'Aqui aparecerão os clientes';})-> name('app.clientes');
    route::get('/fornecedores', function() {return 'Aqui aparecerão os fornecedores';})-> name('app.fornecedores');
    route::get('/produtos', function() {return 'Aqui aparecerão os produtos';})-> name('app.produtos');
});

/* Aqui será passado paramêtros através da rota e retornará na página os parametros passados*/

route::get(
    '/contato/{nome}/{cpf}/{email}', 
    function(string $nome, int $cpf,string $email) {
    echo "teste $nome - $cpf - $email";
})-> where ('nome', '[A-Za-z]+'); 

/*Teste para redirecionamento de rotas*/ 

route::get('/rota1', function() {
    echo 'esta é a rota 1';

}) -> name ('site.rota1');

route::get('/rota2', function(){
    return redirect()-> route('site.rota1');
})-> name('site.rota2');