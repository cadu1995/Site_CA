<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calendario_model
 *
 * @author Cadu
 */
class calendario_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->tabela='calendario';
    }
    
    function get_all(){
        $this->db->select('*');
        $this->db->from($this->tabela);
        return $this->db->get()->result();
    }
    
    function get_by_mounth($mounthinicio){
        list($ano,$mes,$dia)= explode("-",$mounth);
        $this->db->select('*');
        $this->db->from($this->tabela);
        $this->db->where('cal_dataini between '.$ano.'-'.$mes.'-01 and '.$ano.'-'.$mes.'-01');
    }
    //put your code here
}
