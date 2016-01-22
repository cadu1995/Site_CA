<?php

class Autenticacao_model extends CI_Model {
    
    function __construct() {
       parent::__construct();
       
       $this->load->model('adm/funcionalidade_model');
       
    }
    
    function get_user($matricula){
       
        $this->db->select('u.usu_id, u.usu_nome, u.usu_email,u.usu_senha, u.usu_matricula, u.grupos_gru_id');
        
        $this->db->from('usuarios AS u');
        
        $this->db->where('u.usu_matricula', $matricula);
        
        $this->db->where('u.usu_status',1);
        
        $resultado = $this->db->get();
        
        
        if($resultado->num_rows() > 0){
            
            $funcionalidades = $this->get_itens_menu($resultado->row(0)->grupos_gru_id);
            
            $funcionalidades = $this->menu->retira_iguais($funcionalidades);
            
            $usuario = $resultado->row(0);
            $usuario->grupos = $resultado->row(0)->grupos_gru_id;
            
            $usuario->funcionalidades = $funcionalidades;
            
            return $usuario;
        }
        else{
            return FALSE;
        }
    }
    
    function get_itens_menu($id_grupo){
            
        $fun = $this->get_funcionalidade($id_grupo);

        if($fun){
            for($j = 0; $j < sizeof($fun); $j++){
                $new_fun = $this->funcionalidade_model->get_by_id($fun[$j]->funcionalidade_id);
                $funcionalidade[] = $new_fun;    
            }
        }
        
        if(sizeof($funcionalidade) > 0){
            return $funcionalidade;
        }else{
            return FALSE;
        }
    }
    
    function get_funcionalidade($id_grupo){
        
        $this->db->select('funcionalidade_id');
        
        $this->db->from('gru_func');
        
        $this->db->where('grupos_gru_id', $id_grupo);
        
        $funcionalidade = $this->db->get();
        
        if($funcionalidade->num_rows() > 0){
            return $funcionalidade->result();
        }else{
            return FALSE;
        }
    }
    
    
    
    function get_permission($url, $grupos){
        
        $this->db->select('fg.*,f.url');
        
        $this->db->from('gru_func AS fg');
        
        $this->db->join('funcionalidade AS f', 'f.id = fg.funcionalidade_id');

        $this->db->where('f.url',$url);
        
        $this->db->where_in('fg.grupos_gru_id',$grupos);
        
        $resultado = $this->db->get();
        
        if($resultado->num_rows() > 0){
            
            // Retorna a primeira permissao
            return $resultado->row(0);
        }
        else{

            // Caso nao encontre permissoes retorna FALSE
            return FALSE;
        }
        
    }
    
    
}