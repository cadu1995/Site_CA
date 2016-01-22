<?php

class Noticias extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
    }
    
    
    public function index(){
        
        $data['noticias'] = $this->conteudo_model->get_noticias();
        
//        echo '<pre>';
//        print_r($data);
//        die('</pre>');
        
        $this->load->view('noticias',$data);
        
    }
}
