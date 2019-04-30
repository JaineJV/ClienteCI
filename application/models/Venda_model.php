<?php

class Venda_model extends CI_Model{
    
    
    public function getAll(){
    //DEFINE OS CAMPOS QUE SERÃO ADICIONADOS(selecionados)
        $this->db->select('venda.*, cliente.nome');
        
    //define a tabela que serÁ CHAMADA NO FROM DO SELECT
        $this->db->from('venda');
    //realiza o inner join com a tabela cliente
    //o primeiro parametro é a tabela o segundo parametro é os campos que se relacionam
    // eo terceiro parametro é tipo do join(inner, left, right)
    
    $this->db->join('cliente','cliente.id = venda.idCliente', 'inner');
    
                               //nome da tabela no BD
        $query = $this->db->get();
        //result já nos retorna em formato de array
        return $query->result();
    }
}
