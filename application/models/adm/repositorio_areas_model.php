<?php

class Repositorio_areas_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->tabela = 'repositorio_areas';
    }
    
    function get_sub_areas_by_repositorio_id($id){
        
        $this->db->select('areas_conhecimento_are_id');
        $this->db->from($this->tabela);
        $this->db->where('repositorios_rep_id = '.$id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function insert_update_repositorio_areas($sub_areas, $id){
        
        $this->remover($id);

        foreach($sub_areas as $sub){
            $dados['repositorios_rep_id'] = $id;
            $dados['areas_conhecimento_are_id'] = $sub;
            $this->db->insert($this->tabela, $dados);
        }
        
        return (bool)$this->db->affected_rows();
    }
    
     function remover($id){
        
        $this->db->where('repositorios_rep_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    }
}