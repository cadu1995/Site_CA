<?php

class Noticias extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
        $this->load->model('adm/usuario_model');
        
        $this->load->library('form_validation');
    }
    
    
    public function index(){
        
        $data['noticias'] = $this->conteudo_model->get_noticias();
        $data['titulo'] = 'Notícias';
        $data['destaques'] = $this->conteudo_model->get_noticias_destaque();
        $this->load->view('noticias',$data);
        
    }
    
    public function ver($link=NULL){
        
        //Verifica se a função recebeu parâmetros
        if ($link === \NULL) {
            redirect('noticias', 'refresh');
        }
        
        $noticia = $this->conteudo_model->get_by_link($link); 
        
        if(empty($noticia)){
            redirect('noticias', 'refresh');
        }
        
        $data['noticia'] = $noticia;
        $data['destaques'] = $this->conteudo_model->get_noticias_destaque();
        $data['usuario'] = $this->usuario_model->get_by_id($noticia->usuarios_usu_id);
        $this->load->view('vernoticia',$data);
        
    }
    
    public function pesquisa(){
        
        $keyword = $this->input->post('not_search', 1);
        
        if(empty($keyword)){
            redirect('noticias', 'refresh');
        }
        
        $data['noticias'] = $this->conteudo_model->search($keyword);
        $data['titulo'] = 'Pesquisa';
        $data['destaques'] = $this->conteudo_model->get_noticias_destaque();
        $this->load->view('noticias',$data);
    }
}
