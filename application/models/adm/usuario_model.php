<?php

class Usuario_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->load->model('adm/funcionalidade_model');
       
       $this->tabela = 'usuarios';
    }
    
    
    /**
     Funcao get_all pega todos os usuarios cadastrados
     Autor : Icaro Brito de Carvalho Messias
     Data  : 27/01/2015
     Parametro: String contendo o email.
     retorno : objeto usuário
    */
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
        
        $this->db->where('usu_id', $id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
    function inserir($usuario){
        
        $this->db->insert($this->tabela, $usuario);
        
        $inseriu_usuario = (bool)  $this->db->affected_rows();
        
        
        return($inseriu_usuario);
    }
    

    function atualizar($usuario){
        
        $this->db->where('usu_id', (int)$usuario->usu_id);
        
        $this->db->update($this->tabela,$usuario);
        
        $atualizou_usuario = (bool)$this->db->affected_rows();
        
        
        return ($atualizou_usuario);
    }
    

    function remover($id){
        
        $this->db->where('usu_id', (int)$id);
        
        $this->db->delete($this->tabela);
        
        return (bool)$this->db->affected_rows();
    
    }
    
    
    function get_user($matricula){
    
        $this->db->select('*');
        
        $this->db->from($this->tabela);
        
        $this->db->where('usu_matricula', $matricula);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }
    
}
