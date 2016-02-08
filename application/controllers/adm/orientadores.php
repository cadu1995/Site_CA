<?php

class Orientadores extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        if(!$this->autenticacao->verifica_acesso()){
            
            redirect('adm/acesso_negado');
        }
        $this->load->model(array(
             'adm/orientador_model'
        ));
        
        $this->load->library('form_validation');
    }
    
    function index(){
           
        $dados['orientadores'] = $this->orientador_model->get_all();
        $dados['view']   =  'adm/orientadores/index';
        $dados['titulo'] = 'Gerenciar orientadores';
        
        $this->load->view('/layout',$dados);
    }
    
    function cadastrar(){
        
        $dados['titulo'] = 'Cadastrar orientador';
        $dados['view']   = 'adm/orientadores/editar';
        $dados['js'][]   = 'plugins/jquery.validate';
        $dados['js'][]   = 'jquery.mask.min';
        $dados['js'][]   = 'pages/editar_orientador';
        
        $this->load->view('/layout',$dados);
        
    }
    
    
    function editar($id = NULL){
        
        if($id == NULL){
            redirect('adm/orientadores', 'refresh');
        }
          
        $dados['orientador'] = $this->orientador_model->get_by_id($id);
        
        if(empty($dados['orientador'])){
            redirect('adm/orientadores', 'refresh');
        }
        $dados['titulo'] = 'Editar orientador';
        $dados['view']   = 'adm/orientadores/editar';        
        $dados['js'][]   = 'plugins/jquery.validate';
        $dados['js'][]   = 'jquery.mask.min';
        $dados['js'][]   = 'pages/editar_orientador';
        
        $this->load->view('/layout',$dados);
    }
    
    function salvar(){
        
         // Busca as regras de validacao nos arquivos de configuracao
        $regras = $this->config->item('regras_validacao');
        
        // Seta as regras na library de validacao
        $this->form_validation->set_rules($regras);
        
        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        
        
        $orientador = new stdClass();

        $id                                = $this->input->post('id');
        $orientador->ori_nome              = $this->input->post('nome');
        $orientador->ori_email                = $this->input->post('email');
        
        if ($this->form_validation->run() === FALSE) {            
            // Caso os dados sejam invalidos exibe o formulario de validacao novamente
            
            $orientador->ori_id = $id;
            $dados['orientador'] = $orientador;
            
            $dados['titulo'] = 'Editar orientador';
            $dados['view']   = 'adm/orientadores/editar';
            $dados['js'][]   = 'pages/editar_orientador';
            
            $this->load->view('/layout',$dados);
        } else {
    
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');

            $this->session->set_flashdata('msg', $mensagem);

            redirect('adm/orientadores', 'refresh');
        }

        // Verifica se deve atualizar ou inserir o registro
            
            if (empty($id)) {
                // Caso nao seja informado o ID do registro a ser atualizado insere um novo
                $resultado = $this->orientador_model->inserir($orientador);
            } else {
               
                $orientador->ori_id = $id;
                $resultado = $this->orientador_model->atualizar($orientador);
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
            redirect('adm/orientadores', 'refresh');
    }
    
    function remover($id){
        
        // informa o banco de dados qual registro deve ser removido
        $resultado = $this->orientador_model->remover($id);
        
        // Captura o resultado da operacao
        if($resultado){
            
            $mensagem = array('msg' =>'delete-ok', 'tipo'=> 'success');
        }
        else{
            $mensagem = array('msg' =>'erro', 'tipo'=> 'danger');
        }
        
        // Seta a mensagem numa flashdata
        $this->session->set_flashdata('msg',$mensagem);
        
        //Redireciona para a tela de gerenciamento
        redirect('adm/orientadores', 'refresh');
    }
}
   