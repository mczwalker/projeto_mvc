<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Cliente;

class HomeController extends Controller {

    public function index() {
       // $this->render('home');

        $clientes = Cliente::select(['nome', 'nome_fantasia', 'cpf_cnpj', 'telefone', 'email'])->execute();
        $this->render('home', [
            'clientes'=> $clientes
        ]);

    }

}