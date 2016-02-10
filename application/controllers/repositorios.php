<?php

/**
 * Description of repositorio
 *
 * @author ronieri
 */

class Repositorios extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model(array(
            'adm/usuario_model',
             'adm/orientador_model',
             'adm/repositorio_model'
        ));
        $this->load->model('adm/areas_conhecimento_model');
        $this->load->helper('text');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $repositorios = $this->repositorio_model->get_all();
        
        $dados['repositorios'] = array();
        $dados['titulo'] = 'Repositórios';
        $dados['page'] = 'repositorios';
        $dados['areas'] = $this->areas_conhecimento_model->get_all();
        
        foreach ($repositorios as $rep){
            $r = $this->repositorio_model->get_data($rep->rep_id);
            
            $aux = new stdClass();
            $aux->rep_nome = $r->rep_nome;
            $aux->rep_link = $r->rep_link;
            $aux->rep_descricao = word_limiter($r->rep_descricao, 10);
            $aux->rep_autor = $r->rep_autor;
            $aux->rep_autor_email = $r->rep_autor_email;
            $aux->rep_monografia = $r->rep_monografia;
            $aux->ori_nome =$r->ori_nome;
            $aux->ori_email = $r->ori_email;
            
            $dados['repositorios'][] = $aux;
        }
        
        $this->load->view('repositorios', $dados);
    }
    
    public function ver($link){
        if ($link === \NULL) {
            redirect('repositorios', 'refresh');
        }
        $repositorio = $this->repositorio_model->get_by_link($link);
        
        $r = $this->repositorio_model->get_data($repositorio->rep_id);
        
        $aux = new stdClass();
        
        $aux->rep_nome = $r->rep_nome;
        $aux->rep_link = $r->rep_link;
        $aux->rep_descricao = $r->rep_descricao;
        $aux->rep_autor = $r->rep_autor;
        $aux->rep_autor_email = $r->rep_autor_email;
        $aux->rep_monografia = $r->rep_monografia;
        $aux->rep_video = $r->rep_video;
        $aux->rep_codigo_fonte = $r->rep_codigo_fonte;
        $aux->ori_nome =$r->ori_nome;
        $aux->ori_email = $r->ori_email;
        
        $dados['repositorio'] = $aux;
        $dados['page'] = 'repositorios';
        $dados['areas'] = $this->areas_conhecimento_model->get_all();
        
        $this->load->view('verrepositorio', $dados);
    }
    
    public function pesquisa($number = NULL){
        
        $keyword = htmlentities($this->input->post('search'), ENT_QUOTES, 'UTF-8');

        if (!empty($keyword)) {
            $repositorios = $this->repositorio_model->search($keyword);

            $dados['repositorios'] = array();
            $dados['titulo'] = 'Pesquisa';
            $dados['page'] = 'repositorios';
            $dados['keyword'] = $keyword;
            $dados['areas'] = $this->areas_conhecimento_model->get_all();

            if (!empty($repositorios) && is_array($repositorios)) {
                foreach ($repositorios as $rep) {
                    $r = $this->repositorio_model->get_data($rep->rep_id);

                    $aux = new stdClass();
                    $aux->rep_nome = $r->rep_nome;
                    $aux->rep_link = $r->rep_link;
                    $aux->rep_descricao = word_limiter($r->rep_descricao, 10);

                    $dados['repositorios'][] = $aux;
                }
            }

            $this->load->view('repositorios', $dados);
        }elseif ($number != NULL) {
            $repositorios = $this->repositorio_model->search_by_area($number);
            
            
            $dados['repositorios'] = array();
            $dados['titulo'] = 'Pesquisa';
            $dados['page'] = 'repositorios';
            $dados['nome_area'] = $this->areas_conhecimento_model->get_by_number($number);
            $dados['areas'] = $this->areas_conhecimento_model->get_all();

            if (!empty($repositorios) && is_array($repositorios)) {
                foreach ($repositorios as $rep) {
                    $r = $this->repositorio_model->get_data($rep->rep_id);

                    $aux = new stdClass();
                    $aux->rep_nome = $r->rep_nome;
                    $aux->rep_link = $r->rep_link;
                    $aux->rep_descricao = word_limiter($r->rep_descricao, 10);

                    $dados['repositorios'][] = $aux;
                }
            }

            $this->load->view('repositorios', $dados);
        } else {
            redirect('repositorios', 'refresh');
        }
    }
    
}
