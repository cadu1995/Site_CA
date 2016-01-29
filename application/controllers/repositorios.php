<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        $this->load->library('form_validation');
    }
    
    public function index(){
        $repositorios = $this->repositorio_model->get_all();
        
        $dados['repositorios'] = array();
        $dados['titulo'] = 'Repositórios';
        
        foreach ($repositorios as $rep){
            $r = $this->repositorio_model->get_data($rep->rep_id);
            
            $aux = new stdClass();
            $aux->rep_nome = $r->rep_nome;
            $aux->rep_link = $r->rep_link;
            $aux->rep_descricao = $r->rep_descricao;
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
        $repositorio = $this->repositorio_model->get_by_link($link);
        
        $r = $this->repositorio_model->get_data($repositorio->rep_id);
        
        $aux = new stdClass();
        
        $aux->rep_nome = $r->rep_nome;
        $aux->rep_link = $r->rep_link;
        $aux->rep_descricao = $r->rep_descricao;
        $aux->rep_autor = $r->rep_autor;
        $aux->rep_autor_email = $r->rep_autor_email;
        $aux->rep_monografia = $r->rep_monografia;
        $aux->ori_nome =$r->ori_nome;
        $aux->ori_email = $r->ori_email;
        
        $dados['repositorio'] = $aux;
        
        $this->load->view('verrepositorio', $dados);
    }
    
    public function pesquisa(){
        
        $keyword = $this->input->post('rep_search');
        
        if(empty($keyword)){
            redirect('repositorios', 'refresh');
        }
        
        $repositorios = $this->repositorio_model->search($keyword);
        
        $dados['repositorios'] = array();
        $dados['titulo'] = 'Pesquisa';
        
        foreach ($repositorios as $rep){
            $r = $this->repositorio_model->get_data($rep->rep_id);
            
            $aux = new stdClass();
            $aux->rep_nome = $r->rep_nome;
            $aux->rep_link = $r->rep_link;
            $aux->rep_descricao = $r->rep_descricao;
            $aux->rep_autor = $r->rep_autor;
            $aux->rep_autor_email = $r->rep_autor_email;
            $aux->rep_monografia = $r->rep_monografia;
            $aux->ori_nome =$r->ori_nome;
            $aux->ori_email = $r->ori_email;
            
            $dados['repositorios'][] = $aux;
        }
        
        $this->load->view('repositorios',$dados);
    }
    
}
