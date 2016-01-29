<?php

class Eventos extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
        $this->load->model('adm/usuario_model');
        
        $this->load->library('form_validation');
    }
    
    
    public function index(){
        
        $data['eventos'] = $this->conteudo_model->get_eventos();
        $data['titulo'] = 'Eventos';
        $data['destaques'] = $this->conteudo_model->get_eventos_destaque();
        
        $this->load->view('eventos',$data);
        
    }
    
    public function ver($link=NULL){
        //Verifica se a função recebeu parâmetros
        if ($link === \NULL) {
            redirect('eventos', 'refresh');
        }
        
        $evento = $this->conteudo_model->get_by_link($link);
        
        if(empty($evento)){
            redirect('eventos', 'refresh');
        }
        
        $data['evento'] = $evento;
        $data['usuario'] = $this->usuario_model->get_by_id($evento->usuarios_usu_id);
        $data['destaques'] = $this->conteudo_model->get_eventos_destaque();
        $this->load->view('verevento',$data);
        
    }
    
    public function pesquisa(){
        
        $keyword = $this->input->post('not_search');
        
        if(empty($keyword)){
            redirect('noticias', 'refresh');
        }
        
        $data['eventos'] = $this->conteudo_model->search($keyword, 2);
        $data['titulo'] = 'Pesquisa';
        $data['destaques'] = $this->conteudo_model->get_eventos_destaque();
        $this->load->view('eventos',$data);
    }
}
