<?php

/**
 * Description of historia
 *
 * @author ronieri
 */

class Areas_conhecimento_model extends CI_Model {
    
    private $tabela;
    
    function __construct() {
       parent::__construct();
       
       $this->tabela = 'areas_conhecimento';
    }
    
    function get_all(){
        
        $this->db->from($this->tabela);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    function get_by_number($number){
        
        $this->db->select('are_nome')->from($this->tabela)->where('are_numero', $number);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row(0);
        }else{
            return FALSE;
        }
        
    }
}