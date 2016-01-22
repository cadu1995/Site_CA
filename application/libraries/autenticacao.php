<?php

class Autenticacao {
    
    private $CI;
    
    function __construct() {
        
        $this->CI = &get_instance();
        
        $this->CI->load->model('adm/autenticacao_model');
    }
    
    /*
     * @Parametro: String login e senha
     * @Descrição: Verifica se o login e senha conferem com o que esta no banco
     * @Retorno: Boolean
     * 
     */
    function autenticar($matricula, $senha){        
        
        $usuario = $this->CI->autenticacao_model->get_user($matricula);
        
        if($usuario){
            
            if($usuario->usu_senha === $senha){
                
                $this->set_user_data($usuario);
                
                return TRUE;
            }
        }
        return FALSE;
    }
    
    /*
     * @Parametro: Usuario
     * @Descrição: Seta na sessão informações importantes para o sistema
     * @Retorno: NULL
     * 
     */
    function set_user_data($usuario){
        
        $user_data = array(
            'nome'       => $usuario->usu_nome,
            'usuario_id' => $usuario->usu_id,
            'grupos'     => $usuario->grupos_gru_id,
            'email'      => $usuario->usu_email,
            'funcionalidade' => $usuario->funcionalidades
        );
        
        $this->CI->session->set_userdata($user_data);
    }
    
    /*
     * @Parametro: NULL
     * @Descrição: Verifica se o usuario está logado
     * @Retorno: Boolean
     * 
     */
     function verifica_autenticacao(){
        
        $usuario_id = (int)$this->CI->session->userdata('usuario_id');
        
        if($usuario_id > 0){
            
            return TRUE;
        }else{
            
            return FALSE;
        }
    }
    
    /*
     * @Parametro: NULL
     * @Descrição: Verifica se o usuário tem acesso aquela controlers
     * @Retorno: Boolean
     * 
     */
     function verifica_acesso(){
        
        // Captura a controladora que ele tenta acessar
        $controladora = $this->CI->uri->segment(2);        
        
        // Se foi especificada uma controladora
        if(!empty($controladora)){
            
            // Busca os grupos do usuario na sessao
            $grupos_usuario = $this->CI->session->userdata('grupos');
            
            // Busca a permissao do usuario para acessar a controladora
            $permissao = $this->CI->autenticacao_model->get_permission($controladora, $grupos_usuario);
            
            // Se encontrou a permissao 
            if($permissao){                
                return TRUE;
            }else{
                return FALSE;
            }
        }
        return FALSE;
    }
}
