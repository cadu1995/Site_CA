<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calendario
 *
 * @author Cadu
 */
class Calendario extends CI_Controller{
    
        public function __construct() {
        parent::__construct();
        
        if(!$this->autenticacao->verifica_acesso()){
            
            redirect('adm/acesso_negado');
        }
        
         $this->load->model(array(
            'adm/calendario_model'
        ));
        
        $this->load->library('form_validation');
        $this->load->library('calendar');
        
    }
    
    function index(){
        
        $dados['view']   =  'adm/calendario/index';
        $dados['titulo'] = 'Calendario';
        
        $this->load->view('/layout',$dados);
        
    }
}
