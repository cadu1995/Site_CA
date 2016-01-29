<?php

class Categoria_model extends CI_Model {
    
    private $tabela;
    
    public function __construct() {
        
       parent::__construct();
        
       $this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'tipo_conteudo';
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
        
        $this->db->where('tp_con_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function inserir($categoria){
        
        $this->db->insert($this->tabela, $categoria);
        
        $inseriu_categoria = (bool)  $this->db->affected_rows();
        
        
        return($inseriu_categoria);
    }
    
    function atualizar($categoria){
        
        $this->db->where('tp_con_id', (int)$categoria->tp_con_id);
        
        $this->db->update($this->tabela,$categoria);
        
        $atualizou_categoria = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_categoria);
    }
    
    function remover($id){
        
        $this->db->where('tp_con_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    
    }
    
}