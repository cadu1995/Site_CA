<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    
    function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        
        $this->load->library('session');
        
         $this->load->model('adm/usuario_model');
        
        $this->load->helper('form');
        
    }
    
    function index(){
        if($this->session->userdata('usuario_id'))
            redirect('adm/dashboard', 'refresh');
        else
            $this->load->view('adm/login');
    }
    
    function autenticar(){
        
        $regras = array(
            array(
                'field' => 'matricula',
                'label' => 'matricula',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'trim|required'
            ),
        );
        
        $this->form_validation->set_rules($regras);
        
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        
        //Se a validação dos campos for false, atualiza a pagina,se nao autentica
        if($this->form_validation->run() == FALSE){
            $this->load->view('adm/login/index');
            
        }else{
            $this->load->helper('security');
            $matricula = $this->input->post('matricula');
            $senha = do_hash($this->input->post('senha'), 'MD5');
            
            
            $result = $this->autenticacao->autenticar($matricula,$senha);
            
            if($result){
                //Se a autenticacao ocorreu com sucesso, redireciona para a dashboard
                redirect("adm/dashboard");
            }else{
                $verifica = $this->usuario_model->get_user($matricula);
                
                
                if($verifica){
                    if($verifica->usu_senha != $senha){

                        $dados['msg'] = 'Senha incorreta';

                        $this->load->view('adm/login',$dados);
                    }
                }else{
                    $dados['msg'] = 'Matricula não encontrado';

                    $this->load->view('adm/login',$dados);
                }
            }
                    
            
        }
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */