<?php

class Noticias extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
        $this->load->model('adm/usuario_model');
    }
    
    
    public function index(){
        
        $data['noticias'] = $this->conteudo_model->get_noticias();
        
//        echo '<pre>';
//        print_r($data);
//        die('</pre>');
        
        $this->load->view('noticias',$data);
        
    }
    
    public function ver($link=NULL){
        
        $noticia = $this->conteudo_model->get_by_link($link); 
        $usuario = $this->usuario_model->get_by_id($noticia->usuarios_usu_id);
        
        $data['noticia'] = $noticia;
        $data['usuario'] = $usuario;
        $this->load->view('ver',$data);
        
    }
}
