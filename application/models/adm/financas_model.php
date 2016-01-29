<?php

class Financas_model extends CI_Model{
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'financas';
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
        
        $this->db->where('fin_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
     function inserir($financa){
        
        $this->db->insert($this->tabela, $financa);
        
        $inseriu_financa = (bool)  $this->db->affected_rows();
        
        
        return($inseriu_financa);
    }
    
    function atualizar($financa){
        
        $this->db->where('fin_id', (int)$financa->fin_id);
        
        $this->db->update($this->tabela,$financa);
        
        $atualizou_financa = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_financa);
    }
    
    function remover($id){
        
        $this->db->where('fin_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    
    }
    
}
