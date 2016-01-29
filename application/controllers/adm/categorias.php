<?php

class Categorias extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        
        if(!$this->autenticacao->verifica_acesso()){
            
            redirect('adm/acesso_negado');
        }
        
         $this->load->model(array(
            'adm/categoria_model',
        ));
         
         $this->load->config('categorias');
        
        $this->load->library('form_validation');
    }
    
    function index(){
        
        
        $dados['categorias'] = $this->categoria_model->get_all();
        $dados['view']   =  'adm/categorias/index';
        $dados['titulo'] = 'Gerenciar usuários';
        
        $this->load->view('/layout',$dados);
    }
    
    function cadastrar(){
        
        $dados['titulo'] = 'Cadastrar categoria';
        $dados['view']   = 'adm/categorias/editar';
        $dados['js'][]   = 'plugins/jquery.validate';
        
        $this->load->view('/layout',$dados);
        
    }
    
    function editar($id = NULL){
     
        $dados['categoria'] = $this->categoria_model->get_by_id($id);        
        $dados['titulo'] = 'Editar categoria';
        $dados['view']   = 'adm/categorias/editar';        
        $dados['js'][]   = 'plugins/jquery.validate';
              
        $this->load->view('/layout',$dados);
    }
    
    function remover($id = NULL){
        
        $resultado = $this->categoria_model->remover($id);
        
        if($resultado){
            
            $mensagem = array('msg' =>'delete-ok', 'tipo'=> 'success');
        }
        else{
            $mensagem = array('msg' =>'erro', 'tipo'=> 'danger');
        }
        
        // Seta a mensagem numa flashdata
        $this->session->set_flashdata('msg',$mensagem);
        
        //Redireciona para a tela de gerenciamento
        redirect('adm/categorias', 'refresh');
    }
    
    function salvar(){
        
         // Busca as regras de validacao nos arquivos de configuracao
        $regras = $this->config->item('regras_validacao');
        
        // Seta as regras na library de validacao
        $this->form_validation->set_rules($regras);
        
        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        
        
        $categoria = new stdClass();
        
        $id                                     = $this->input->post('id');
        $categoria->tp_con_titulo               = $this->input->post('nome');
        
        if ($this->form_validation->run() === FALSE) {            
            // Caso os dados sejam invalidos exibe o formulario de validacao novamente
            
            $categoria->tp_con_id = $id;
            $dados['categoria'] = $categoria;
            $dados['titulo'] = 'Editar categoria';
            $dados['view']   = 'adm/categorias/editar';
            
            $this->load->view('/layout',$dados);
            
        } else {
            

        // Verifica se deve atualizar ou inserir o registro
            
            if (empty($id)) {
                // Caso nao seja informado o ID do registro a ser atualizado insere um novo
                $resultado = $this->categoria_model->inserir($categoria);
            } else {
               
                $categoria->tp_con_id = $id;
                $resultado = $this->categoria_model->atualizar($categoria);
            }

            // Captura o resultado da operacao e seta a mensagem a ser exibida para o usuario
            if ($resultado) {

                if (empty($id)) {

                    $mensagem = array('msg' => 'insert-ok', 'tipo' => 'success');
                } else {

                    $mensagem = array('msg' => 'update-ok', 'tipo' => 'info');
                }
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            }

            // Grava a mensagem numa flashdata
            $this->session->set_flashdata('msg', $mensagem);

            // Redireciona o usuario para a tela de gerenciamento
            redirect('adm/categorias', 'refresh');
        }
    }
    
}