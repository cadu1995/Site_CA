<?php

/**
 * Description of historia
 *
 * @author ronieri
 */

class Eventos extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('adm/conteudo_model');
        $this->load->model('adm/usuario_model');
        $this->load->model('adm/areas_conhecimento_model');
        $this->load->helper('text');
        $this->load->library('form_validation');
    }
    
    
    public function index(){
        
        $data['eventos'] = $this->conteudo_model->get_eventos();
        $data['titulo'] = 'Eventos';
        $data['page'] = 'eventos';
        $data['areas'] = $this->areas_conhecimento_model->get_all();
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
        
        $data['page'] = 'eventos';
        $data['evento'] = $evento;
        $data['areas'] = $this->areas_conhecimento_model->get_all();
        $data['usuario'] = $this->usuario_model->get_by_id($evento->usuarios_usu_id);
        $data['destaques'] = $this->conteudo_model->get_eventos_destaque();
        $this->load->view('verevento',$data);
        
    }
    
    public function pesquisa($number = NULL){
        
        $keyword = htmlentities($this->input->post('search'), ENT_QUOTES, 'UTF-8');
        
        if (!empty($keyword)) {
            $data['page'] = 'eventos';
            $data['eventos'] = $this->conteudo_model->search($keyword, 2);
            $data['titulo'] = 'Pesquisa';
            $data['keyword'] = $keyword;
            $data['areas'] = $this->areas_conhecimento_model->get_all();
            $data['destaques'] = $this->conteudo_model->get_eventos_destaque();
            $this->load->view('eventos', $data);
        }elseif($number != NULL){
            $data['page'] = 'eventos';
            $data['eventos'] = $this->conteudo_model->search_by_area($number, 2);
            $data['titulo'] = 'Pesquisa';
            $data['nome_area'] = $this->areas_conhecimento_model->get_by_number($number);
            $data['areas'] = $this->areas_conhecimento_model->get_all();
            $data['destaques'] = $this->conteudo_model->get_eventos_destaque();
            $this->load->view('eventos', $data);
        }else{
            redirect('noticias', 'refresh');
        }
    }
}
