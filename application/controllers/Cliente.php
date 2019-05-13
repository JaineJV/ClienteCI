<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//Todo controller do codeigniter precisa extender (ser filho) da classe CI_Controller
class Cliente extends CI_Controller {
    
    /*
     * Método construtor que é chamado sempre que a classe Cliente for usada, ou seja, 'instanciada'.
     */
    public function __construct() {
        //chama o construtor da classe pai(CI_Controller)
        parent::__construct();
        //chama o método que faz a validação de login de usuário
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    //o método index é o método chamado por padrão quando nenhum método é definido na URL da requisição 
    public function index() {
        $this->listar();
    }

    public function listar() {
        //carregar o model pelo nome      - apelido0
        $this->load->model('Cliente_model', 'cm');
        //$data precisa ser em formato de array para ser passada para a View
        //chamamos o método getAll do Cliente_model
        $data['clientes'] = $this->cm->getAll();

        //carrega a View passando o conteúdo da variável $data
        $this->load->view('Header');
        $this->load->view('ListaClientes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        //cria as regras de validação do formulário
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');
        //valida se todos os requisitos do form foram atendidos 
        if ($this->form_validation->run() == false) {
            //caso não tenha passado na validação, carrega o formulários
            $this->load->view('Header');
            $this->load->view('FormCliente');
            $this->load->view('Footer');
        } else {
            //carrega o model
            $this->load->model('Cliente_model');
            //resgata os dados por POST
            $data = array(
                'nome' => $this->input->post('nome'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf')
            );
            //chama o método insert do Model passando os dados a inserir, e ja valida se teve linhas afetadas
            if ($this->Cliente_model->insert($data)) {
                //salva uma mensagem na sessão
                $this->session->set_flashdata('mensagem', 'Cliente cadastrado com sucesso!');
                redirect('Cliente/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Cliente!!!');
                redirect('Cliente/cadastrar');
            }
        }
    }

    public function alterar($id){
        if ($id > 0) {
            $this->load->model('Cliente_model');

            //cria as regras de validação do formulário
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            //valida se o formulario já foi preenchido
            if ($this->form_validation->run() == false) {
                //monta a variavel data para mandar dados para a view e chama o metodo getOne do cliente model
                //para resgatar os dados do cliente a ser alterado
                $data['cliente'] = $this->Cliente_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('FormCliente', $data);
                $this->load->view('Footer');
            } else {
                //resgata os daods recebidos por POST
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf')
                );
                //chama o método update do cliente model e já valida se teve linhas afetadas
                if($this->Cliente_model->update($id, $data)){
                    $this->session->set_flashdata('mensagem', 'Cliente alterado com sucesso!');
                    redirect('Cliente/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Cliente...');
                    redirect('Cliente/alterar/'.$id);
                }
            }
        } else {
            redirect('Cliente/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){//controller recebe requisição e manda para o model
            $this->load->model('Cliente_model');
            //manda para o model deletar e ja valida o retorno pra saber se deu certo
           if($this->Cliente_model->delete($id)){
               $this->session->set_flashdata('mensagem', 'Cliente deletado com sucesso!');
           } else {
               $this->session->set_flashdata('mensagem', 'Falha ao deletar Cliente...');
           }
            
            redirect('Cliente/listar');
        } 
        redirect('Cliente/listar');//redireciona para o controller Cliente e ao método listar
    }

}
