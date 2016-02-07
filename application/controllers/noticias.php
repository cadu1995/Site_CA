<?php

class Noticias extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
        $this->load->model('adm/usuario_model');
        $this->load->model('adm/areas_conhecimento_model');
        $this->load->helper('text');
        $this->load->library('form_validation');
    }
    
    
    public function index(){
        
        $data['noticias'] = $this->conteudo_model->get_noticias();
        $data['areas'] = $this->areas_conhecimento_model->get_all();
        $data['page'] = 'noticias';
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
        
        $data['page'] = 'noticias';
        $data['noticia'] = $noticia;
        $data['areas'] = $this->areas_conhecimento_model->get_all();
        $data['destaques'] = $this->conteudo_model->get_noticias_destaque();
        $data['usuario'] = $this->usuario_model->get_by_id($noticia->usuarios_usu_id);
        $this->load->view('vernoticia',$data);
        
    }
    
    public function pesquisa($number = NULL){
        
        $keyword = $this->input->post('search');
        
        if(!empty($keyword)){
            $data['page'] = 'noticias';
            $data['noticias'] = $this->conteudo_model->search($keyword, 1);
            $data['titulo'] = 'Pesquisa';
            $data['areas'] = $this->areas_conhecimento_model->get_all();
            $data['keyword'] = $keyword;
            $data['destaques'] = $this->conteudo_model->get_noticias_destaque();
            $this->load->view('noticias', $data);
        }elseif ($number != NULL) {
            $data['page'] = 'noticias';
            $data['noticias'] = $this->conteudo_model->search_by_area($number, 1);
            $data['titulo'] = 'Pesquisa';
            $data['areas'] = $this->areas_conhecimento_model->get_all();
            $data['nome_area'] = $this->areas_conhecimento_model->get_by_number($number);
            $data['destaques'] = $this->conteudo_model->get_noticias_destaque();
            $this->load->view('noticias', $data);
        }else{
            redirect('noticias', 'refresh');
        }
    }
}
