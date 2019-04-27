<?php

/**
 * Classe model da tabela clientes do banco de dados
 */
class Usuario_model extends CI_Model {

    //metodo que busca o usuario no BD 
    //recabe como parametro o email e senha
    public function getUsuario($email, $senha) {
        $this->db->where('email', $email);
        $this->db->where('senha', sha1($senha . 'jaineSENAC'));

        $query = $this->db->get('usuario');
        return $query->row(0);
    }

    /*
     * Método que valida na sessão se o usuário está logado 
     */

    public function verificaLogin() {
        //resgata  na sessão o status logado e o id do usuario
        $logado = $this->session->userdata('logado');
        $idUsuario = $this->session->userdata('idUsuario');
        //verifica se o status está setado, ou não está true, ou não tem idUsuario
        if((!isset($logado)) || ($logado != true) || ($idUsuario <= 0)){
            //redireciona obrigando o login..
            redirect($this->config->base_url() . 'index.php/Usuario/login');
        }
    }

}
