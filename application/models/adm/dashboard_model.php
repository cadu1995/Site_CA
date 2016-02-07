<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author ronieri
 */
class Dashboard_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->tabela='log_sessions';
    }
    
    function get_access(){
        $this->db->select('date(log_date) as dia');
        $this->db->select('count(*) as acessos');
        $this->db->from($this->tabela);
        $this->db->group_by('date(log_date)');
        $this->db->order_by('date(log_date)', 'desc');
        $this->db->limit('10');
        
        return $this->db->get()->result();
    }
}
