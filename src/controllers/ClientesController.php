<?php
namespace src\controllers;

use \core\Controller;
use \src\Models\Cliente;
use \src\Models\Contato;
use \src\Models\Endereco;

class ClientesController extends Controller {

    public function cadastrar() {
        $this->render('cadastrar');
    }

    public function addAction(){
        $nome = filter_input(INPUT_POST, 'nome');
        $nome_fantasia = filter_input(INPUT_POST, 'nome-fantasia');
        $cpf_cnpj = filter_input(INPUT_POST, 'cpf-cnpj');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $email = filter_input(INPUT_POST, 'email');
        $cep = filter_input(INPUT_POST, 'cep');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $estado = filter_input(INPUT_POST, 'estado');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $nome_contato = filter_input(INPUT_POST, 'nome-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $telefone_contato = filter_input(INPUT_POST, 'telefone-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $email_contato = filter_input(INPUT_POST, 'email-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if($nome && (strlen($cpf_cnpj) === 11 OR strlen($cpf_cnpj) === 14)  && $telefone){
            
            $dados = Cliente::select()->where('cpf_cnpj', $cpf_cnpj)->execute();
            if(count($dados) === 0){
                Cliente::insert([
                    'nome' => $nome,
                    'nome_fantasia' => $nome_fantasia,
                    'cpf_cnpj' => $cpf_cnpj,
                    'telefone' => $telefone,
                    'email' => $email
                ])->execute();

                
                Endereco::insert([
                'id_cliente' => $cpf_cnpj,
                'cep' => $cep,
                'endereco' => $endereco,
                'estado' => $estado,
                'cidade' => $cidade,
                'numero' => $numero,
                'complemento' => $complemento
                ])->execute();
                
                
                //Percorre os arrays enviados no input de contatos e salva no banco
                for($c = count($email_contato)-1; $c >= 0; $c--){
                    echo 'Nome do contato inserido: '.$nome_contato[$c];
                    Contato::insert([
                        'id_cliente' => $cpf_cnpj,
                        'nome' => $nome_contato[$c],
                        'telefone' => $telefone_contato[$c],
                        'email' => $email_contato[$c]
                    ])->execute();
                }
                    
                $this->redirect('/');

            }else{
                echo 'Já existe cadastro de Cliente com este CPF/CNPJ';
            }
        }else{
            $this->redirect('/cadastrarCliente');
        } 
    }
    
        public function deletar($args){
            Contato::delete()->where('id_cliente', $args['chave'])->execute();
            Endereco::delete()->where('id_cliente', $args['chave'])->execute();
            Cliente::delete()->where('cpf_cnpj', $args['chave'])->execute();

            $this->redirect('/');
        }


        public function editar($args){
            $cCliente = Cliente::select()->where('cpf_cnpj', $args['chave'])->one();
            $cEndereco = Endereco::select()->where('id_cliente', $args['chave'])->one();
            $cContato = Contato::select()->where('id_cliente', $args['chave'])->execute();

            $this->render('editarCliente', [
                'cliente' => $cCliente, 
                'endereco' => $cEndereco, 
                'contatos' => $cContato
            ]);
        }

        public function editarAction($args){


            $nome = filter_input(INPUT_POST, 'nome');
            $nome_fantasia = filter_input(INPUT_POST, 'nome-fantasia');
            $telefone = filter_input(INPUT_POST, 'telefone');
            $email = filter_input(INPUT_POST, 'email');
            $cep = filter_input(INPUT_POST, 'cep');
            $endereco = filter_input(INPUT_POST, 'endereco');
            $estado = filter_input(INPUT_POST, 'estado');
            $cidade = filter_input(INPUT_POST, 'cidade');
            $numero = filter_input(INPUT_POST, 'numero');
            $complemento = filter_input(INPUT_POST, 'complemento');
            $id_contato = filter_input(INPUT_POST, 'id-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $nome_contato = filter_input(INPUT_POST, 'nome-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $telefone_contato = filter_input(INPUT_POST, 'telefone-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $email_contato = filter_input(INPUT_POST, 'email-contato', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            if($nome && $telefone){
            
                for($c = count($email_contato)-1; $c >= 0; $c--){
                    Contato::update()
                    ->set('nome', $nome_contato[$c])
                    ->set('telefone', $telefone_contato[$c])
                    ->set('email', $email_contato[$c])
                    ->where('id_contatos', $id_contato[$c])
                    ->execute();
                }
                
                Cliente::update()
                    ->set('nome', $nome)
                    ->set('nome_fantasia', $nome_fantasia)
                    ->set('telefone', $telefone)
                    ->set('email', $email)
                    ->where('cpf_cnpj', $args['chave'])->execute();
                
                
                Endereco::update()
                    ->set('cep', $cep)
                    ->set('endereco', $endereco)
                    ->set('estado', $estado)
                    ->set('cidade', $cidade)
                    ->set('numero', $numero)
                    ->set('complemento', $complemento)
                    ->where('id_cliente', $args['chave'])->execute();
                
                $this->redirect('/');
            
            }else{
                $this->redirect('/editarCliente/'.$args['chave']);
            }
        }

}