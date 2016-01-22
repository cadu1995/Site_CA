<?php

class Conteudo_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       //$this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'conteudo';
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
        
        $this->db->where('con_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function criar($conteudo){
        
        $this->db->insert($this->tabela, $conteudo);
        
        $criou_conteudo = $this->db->insert_id();
        
        
        return((int)$criou_conteudo);
    }
    

    function atualizar($conteudo){
        
        $this->db->where('con_id', (int)$conteudo->con_id);
        
        $this->db->update($this->tabela,$conteudo);
        
        $atualizou_conteudo = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_conteudo);
    }
    

    function remover($id){
        
        $this->db->where('con_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    
    }
    
    function get_all_by_date(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_noticias(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('tipo_conteudo_tp_con_id', 1);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_eventos(){
        
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('tipo_conteudo_tp_con_id', 2);
        
        $this->db->order_by('con_data_registro', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_by_link($link){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('con_link', $link);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
}
