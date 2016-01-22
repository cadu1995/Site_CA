<?php

class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();   
        
        if(!$this->autenticacao->verifica_autenticacao()){
            
            redirect('adm/login');
        }
        
    }
    
    function index(){        
        
        $dados['titulo'] = 'Centro Academico';
        $dados['view']   =  'adm/dashboard/index';       
        
        $this->load->view('/layout',$dados);
        
    }
    
    
    
   
}
