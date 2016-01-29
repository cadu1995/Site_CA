<?php

class Orientador_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'orientadores';
    }

    
    
    function get_all(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_by_id($id){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('ori_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function inserir($orientador){
        
        $this->db->insert($this->tabela, $orientador);
        
        $inseriu_orientador = (bool)  $this->db->affected_rows();
        
        
        return($inseriu_orientador);
    }
    

    function atualizar($orientador){
        
        $this->db->where('ori_id', (int)$orientador->ori_id);
        
        $this->db->update($this->tabela,$orientador);
        
        $atualizou_orientador = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_orientador);
    }
    

    function remover($id){
        
        $this->db->where('ori_id', (int)$id);
        
        $this->db->delete($this->tabela);
        die();
        return (bool)$this->db->affected_rows();
    
    }
    
}


