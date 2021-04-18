<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/cadastrarCliente', 'ClientesController@cadastrar');
$router->post( '/cadastrarCliente', 'ClientesController@addAction');
$router->get( '/deletarCliente/{chave}', 'ClientesController@deletar');
$router->get( '/editarCliente/{chave}', 'ClientesController@editar');
$router->post( '/editarCliente/{chave}', 'ClientesController@editarAction');



