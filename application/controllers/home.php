<?php

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
    }
    
    public function index(){
        
         $conteudo = $this->conteudo_model->get_all_by_date();
         
         $data['slide'] = array();
         $data['noticias'] = array();
         $data['eventos'] = array();
         
         
         foreach ($conteudo as $c){
             if($c->con_destaque == 1){
                 $data['slide'][] = $c;
             }else
             if($c->tipo_conteudo_tp_con_id == 1){
                 $data['noticias'][] = $c;
             }else{
                 $data['eventos'][] = $c;
             }
             
         }
        
        $this->load->view('home',$data);
        // $this->load->view('slide');
         
    }
    
    public function noticias(){
        
        $this->load->view('noticias');
    }
}