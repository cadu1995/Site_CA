<?php

class Conteudo_sub_area_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->tabela = 'conteudo_sub_area';
    }
    
    function get_sub_areas_by_conteudo_id($id){
        
        $this->db->select('sub_area_id');
        $this->db->from($this->tabela);
        $this->db->where('conteudo_id = '.$id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function insert_update_conteudo_areas($sub_areas, $id){
        
        $this->remover($id);

        foreach($sub_areas as $sub){
            $dados['conteudo_id'] = $id;
            $dados['sub_area_id'] = $sub;
            $this->db->insert($this->tabela, $dados);
        }
        
        return (bool)$this->db->affected_rows();
    }
    
     function remover($id){
        
        $this->db->where('conteudo_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    }
}