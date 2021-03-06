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
        
        $inseriu_repositorio = (int)  $this->db->insert_id();
       
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
        $this->db->or_like('rep_descricao', $keyword);
        $this->db->or_like('rep_autor', $keyword);
        $this->db->order_by('rep_data', 'desc');
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }
    
    function search_by_area($number){
        
        $this->db->select('rep_id, rep_nome, rep_descricao, rep_link')->from($this->tabela)->
                join('repositorio_areas', 'repositorios_rep_id = rep_id')->
                join('sub_areas_conhecimento', 'sub_area_id = repositorio_areas.areas_conhecimento_are_id')->
                join('areas_conhecimento', 'repositorio_areas.areas_conhecimento_are_id = areas_conhecimento.are_id')->
                where('are_numero', $number)->
                group_by('rep_id')->order_by('rep_data', 'desc');

        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }
}

