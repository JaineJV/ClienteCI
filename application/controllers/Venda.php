<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Controller{

    public function __construct() {
        //chama o construtor da classe pai(CI_Controller)
        parent::__construct();
        //chama o método que faz a validação de login de usuário
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }
    
    public function listar(){
        $this->load->model('Venda_model');
        $dados['vendas'] = $this->Venda_model->getAll();
        
        $this->load->view('ListaVendas', $dados);
    }
}
