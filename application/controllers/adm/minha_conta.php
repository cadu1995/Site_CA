<?php

class Minha_conta extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
         $this->load->model(array(
            'adm/usuario_model',
            'adm/grupo_model'
        ));
         
         $this->load->config('usuarios');
        
        $this->load->library('form_validation');
        
    }
    
    function index(){
        
        $id = $this->session->userdata('usuario_id');
        $dados['usuario'] = $this->usuario_model->get_by_id($id); 
        $dados['view']   =  'adm/minha_conta/index';
        $dados['titulo'] = 'Minha Conta';
        $dados['css'][] = 'jquery-ui.blue';
        $dados['js'][] = 'data/jquery-ui';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][]   = 'minha_conta.init';
        
        $this->load->view('/layout',$dados);
    }
    
    function salvar(){
        
         // Busca as regras de validacao nos arquivos de configuracao
        $regras = $this->config->item('regras_validacao');
        
        // Seta as regras na library de validacao
        $this->form_validation->set_rules($regras);
        
        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        
        
        $usuario = new stdClass();

        $id                                     = $this->input->post('id');
        $usuario->usu_nome                      = $this->input->post('nome');
        $usuario->usu_telefone                  = $this->input->post('telefone');
        $usuario->usu_matricula                 = $this->input->post('matricula');
        $usuario->usu_email                     = $this->input->post('email');
        $usuario->usu_status                    = $this->input->post('status');
        $usuario->usu_data_nascimento           = $this->input->post('data_nascimento');
        $usuario->usu_sexo                      = $this->input->post('sexo');
        
        $usuario->grupos_gru_id         = $this->session->userdata('grupos');
        
        $senha = $this->input->post('senha');
        
        
        
        if ($this->form_validation->run() === FALSE) {            
            // Caso os dados sejam invalidos exibe o formulario de validacao novamente
            
            $usuario->id = $id;
            $dados['usuario'] = $usuario; 
            $dados['grupos']  = $this->grupo_model->get_all();
            
            $dados['titulo'] = 'Editar usuário';
            $dados['view']   = 'adm/usuarios/editar';
            $dados['css'][] = 'jquery-ui.blue';
            $dados['js'][] = 'data/jquery-ui';
            $dados['js'][] = 'jquery.mask.min';
            $dados['js'][]   = 'minha_conta.init';
            
            $this->load->view('/layout',$dados);
        } else {
            
            // Se foi informada a senha do usuario criptografa ela
            if (!empty($senha)) {
                $this->load->helper('security');
                $senha = do_hash($senha, 'MD5');
                
                $usuario->usu_senha = $senha;
 
            }

            // atualiza o registro
            

               
                $usuario->usu_id = $id;
                $resultado = $this->usuario_model->atualizar($usuario);

            // Captura o resultado da operacao e seta a mensagem a ser exibida para o usuario
            if ($resultado) {
                
                $mensagem = array('msg' => 'update-ok', 'tipo' => 'info');

            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            }

            // Grava a mensagem numa flashdata
            $this->session->set_flashdata('msg', $mensagem);

            // Redireciona o usuario para a tela de gerenciamento
            redirect('adm/dashboard', 'refresh');
        }
    }
    
}
