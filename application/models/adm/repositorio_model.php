<?php

class Repositorio_model extends CI_Model{
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'repositorios';
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
        
        $this->db->where('rep_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function inserir($repositorio){
        
        $this->db->insert($this->tabela, $repositorio);
        
        $inseriu_repositorio = (bool)  $this->db->affected_rows();
       
        return($inseriu_repositorio);
    }
    
    function atualizar($repositorio){
        
        $this->db->where('rep_id', (int)$repositorio->rep_id);
        
        $this->db->update($this->tabela,$repositorio);
        
        $atualizou_repositorio = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_repositorio);
    }
    

    function remover($id){
        
        $this->db->where('rep_id', (int)$id);
        
        $this->db->delete($this->tabela);
      
        return (bool)$this->db->affected_rows();
    }
    
    function get_data($id){
        $this->db->from($this->tabela);
        $this->db->join('usuarios', 'usu_id = usuarios_usu_id');
        $this->db->join('orientadores', 'ori_id = orientadores_ori_id');
        $this->db->where('rep_id = '.$id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function link($link){
        $this->db->select('COUNT(rep_link) as cnt');
        
        $this->db->from($this->tabela);
        
        $this->db->where('rep_link', $link);
        
        $result = $this->db->get();
        
        $ret = $result->row(0);
        
        return (int)$ret->cnt;
    }
    
    function get_by_link($link){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('rep_link', $link);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function search($keyword)
    {
        $this->db->from($this->tabela);
        
        $this->db->like('rep_nome', $keyword);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }
      
}

