<?php

class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();   
        
        if(!$this->autenticacao->verifica_autenticacao()){
            
            redirect('adm/login');
        }
        $this->load->model('adm/dashboard_model');
    }
    
    function index(){        
        
        $dados['titulo'] = 'Centro Academico';
        $dados['view']   =  'adm/dashboard/index';
        if ($this->session->userdata('grupos') == 1) {
            $dados['js'][] = 'flot/jquery.flot';
            $dados['js'][] = 'flot/jquery.flot.categories';
            $dados['js'][] = 'dash';
        }

        $this->load->view('/layout',$dados);
        
    }
    
    function dados(){
        $dados = $this->dashboard_model->get_access();
        $aux = array();
        foreach ($dados as $dd){
            list($ano, $mes, $dia) = explode('-', $dd->dia);
            $aux[] = array($dia.'/'.$mes.'/'.$ano,(int)$dd->acessos);
        }
        $data = array('label' => 'Acessos', 'data' => $aux);
        header('Content-Type: application/json');
        echo json_encode( $data );
    }
    
   
}
