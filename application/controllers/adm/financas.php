<?php

Class Financas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->autenticacao->verifica_acesso()) {

            redirect('adm/acesso_negado');
        }

        $this->load->model(array(
            'adm/financas_model'
        ));

        $this->load->config('financas');

        $this->load->library('form_validation');
    }

    function index() {


        $dados['financas'] = $this->financas_model->get_all();
        $dados['view'] = 'adm/financas/index';
        $dados['titulo'] = 'Gerenciar Finanças';

        $this->load->view('/layout', $dados);
    }

    function cadastrar() {

        $dados['titulo'] = 'Cadastrar finança';
        $dados['view'] = 'adm/financas/editar';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'fin_javascript';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][] = 'maskmoney';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'data/jquery-ui.min';
        $dados['js'][] = 'init';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'jquery-ui.blue';



        $this->load->view('/layout', $dados);
    }

    function editar($id = NULL) {

        $financa = $this->financas_model->get_by_id($id);
        list($ano, $mes, $dia) = explode('-', $financa->fin_data);

        if (strpos($financa->fin_valor, '.') !== FALSE){
            list($ntc, $cnt) = explode('.', $financa->fin_valor);
        }

        if (isset($cnt) && strlen($cnt) == 1) {
            $financa->fin_valor = $financa->fin_valor . '0';
        }

        $financa->fin_data = $dia . $mes . $ano;
        $dados['financa'] = $financa;
        $dados['titulo'] = 'Editar finança';
        $dados['view'] = 'adm/financas/editar';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'fin_javascript';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][] = 'maskmoney';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'data/jquery-ui.min';
        $dados['js'][] = 'init';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'jquery-ui.blue';

        $this->load->view('/layout', $dados);
    }

    function salvar() {

        // Busca as regras de validacao nos arquivos de configuracao
        $regras = $this->config->item('regras_validacao');

        // Seta as regras na library de validacao
        $this->form_validation->set_rules($regras);

        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');


        $financa = new stdClass();

        $id = $this->input->post('id');
        $financa->usuarios_usu_id = $this->session->userdata('usuario_id');
        $financa->fin_descricao = $this->input->post('descricao');
        $financa->fin_valor = $this->input->post('valor');
        $financa->fin_tipo = $this->input->post('tipo');
        $financa->fin_data = $this->input->post('data');
        list($dia, $mes, $ano) = explode('/', $financa->fin_data);
        $financa->fin_data = $ano . $mes . $dia;

        $diretorio = 'img/financas/';

        //Configurações para o upload
        $config['upload_path'] = './' . $diretorio;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2500';
        $config['max_width'] = '2000';
        $config['max_height'] = '1500';

        $files = $_FILES['fin_imagem'];

        $number_of_files = sizeof($_FILES['fin_imagem']['tmp_name']);

        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];
            //now we initialize the upload library
            $this->upload->initialize($config);
            // we retrieve the number of files that were uploaded
            if ($this->upload->do_upload('uploadedimage')) {
                $img_path = $this->upload->data();
                $financa->fin_imagem = $diretorio . $img_path['file_name'];
            } else {
                ;
            }
        }



        if ($this->form_validation->run() === FALSE) {
            // Caso os dados sejam invalidos exibe o formulario de validacao novamente

            $financa->id = $id;
            $dados['financa'] = $financa;
            $dados['titulo'] = 'Editar financa';
            $dados['view'] = 'adm/financas/editar';

            $this->load->view('/layout', $dados);
        } else {


            // Verifica se deve atualizar ou inserir o registro

            if (empty($id)) {
                // Caso nao seja informado o ID do registro a ser atualizado insere um novo
                $resultado = $this->financas_model->inserir($financa);
            } else {

                $financa->fin_id = $id;
                $resultado = $this->financas_model->atualizar($financa);
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
            redirect('adm/financas', 'refresh');
        }
    }

    function remover($id = NULL) {
        if($this->session->userdata('grupos') != 1){
            redirect('adm/financas');
        }

        $resultado = $this->financas_model->remover($id);

        if ($resultado) {

            $mensagem = array('msg' => 'delete-ok', 'tipo' => 'success');
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
        }

        // Seta a mensagem numa flashdata
        $this->session->set_flashdata('msg', $mensagem);

        //Redireciona para a tela de gerenciamento
        redirect('adm/financas', 'refresh');
    }

}
