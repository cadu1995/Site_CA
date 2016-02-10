<?php

/**
 * Description of historia
 *
 * @author ronieri
 */

class Sub_areas_conhecimento_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->tabela = 'sub_areas_conhecimento';
    }
    
    function get_sub_areas_by_areas_id($id){
        
        $this->db->from($this->tabela);
        $this->db->where('areas_conhecimento_are_id = '.$id);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_sub_areas_group_by_areas(){
        $this->load->model('adm/areas_conhecimento_model');
        $areas = $this->areas_conhecimento_model->get_all();
        
        foreach($areas as $area){
            $aux = new stdClass();
            $aux->are_id = $area->are_id;
            $aux->are_nome = $area->are_nome;
            $aux->are_numero = $area->are_numero;
            
            $this->db->select('sub_area_id, sub_area_titulo, sub_area_numero');
            $this->db->from($this->tabela);
            $this->db->join('areas_conhecimento', 'are_id = areas_conhecimento_are_id');
            $this->db->where('areas_conhecimento_are_id = '.$area->are_id);
            
            $result = $this->db->get();
            
            $aux->sub_areas = $result->result();
        
            $retorno->sub_areas[] = $aux;
        }
        
        return $retorno;
    }
}

