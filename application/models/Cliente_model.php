<?php
/**
 * Classe model da tabela clientes do banco de dados
 */

//todo Model precisa extender a classe CI_Model do framework
class Cliente_model extends CI_Model {
    //buscam a tabela cliente no banco de dados
    //Método que realiza a busca de todos os clientes no BD
    public function getAll(){
                               //nome da tabela no BD
        $query = $this->db->get('cliente');
        //result já nos retorna em formato de array
        return $query->result();
    }
    
    /**
     * Método que recebe os dados por parametro e insere no BD 
     */
    public function insert($data = array()){
        $this->db->insert('cliente', $data);
        return $this->db->affected_rows();
    }
    //método que recebe um id por parametro e busca apenas o cliente com este id la no BD
    public function getOne($id){
        //faz o filtro por id na consulta SQL
        $this->db->where('id', $id);
        //busca o cliente na base respeitando o filtro
        $query = $this->db->get('cliente');
        //retorna apenas a primeira linha
        return $query->row(0);
    }
    /**
     * Método que recebe o ID do cliente a alterar e os dados para alterar e faz o update na base de dados
     */
    
    public function update($id, $data = array()){
        if($id > 0){
            //filtra o cliente que será alterado
            $this->db->where('id', $id);
            //altera os dados de acordo com o recebido por parametro
            $this->db->update('cliente', $data);
            //retorno do numero de linhas afetadas
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id', $id);
            $this->db->delete('cliente');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
}
