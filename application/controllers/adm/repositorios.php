<?php

class Repositorios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->autenticacao->verifica_acesso()) {
            redirect('adm/acesso_negado');
        }

        $this->load->model(array(
            'adm/usuario_model',
            'adm/sub_areas_conhecimento_model',
            'adm/repositorio_areas_model',
            'adm/orientador_model',
            'adm/repositorio_model'
        ));
        $this->load->helper('text');
        $this->load->library('form_validation');
    }

    function index() {
        $dados['repositorios'] = $this->repositorio_model->get_all();
        $dados['view'] = 'adm/repositorios/index';
        $dados['titulo'] = 'Gerenciar Repositório';

        $this->load->view('/layout', $dados);
    }

    function cadastrar() {
        $dados['orientadores'] = $this->orientador_model->get_all();
        $dados['usuarios'] = $this->usuario_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['titulo'] = 'Cadastrar repositório';
        $dados['view'] = 'adm/repositorios/editar';
        $dados['js'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'jquery.mask.min';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'repositorio.init';

        $this->load->view('/layout', $dados);
    }

    function editar($id = NULL) {
        if($id == NULL){
            redirect('adm/repositorios', 'refresh');
        }
        $dados['repositorio'] = $this->repositorio_model->get_by_id($id);
        if(empty($dados['repositorio'])){
            redirect('adm/repositorios', 'refresh');
        }
        $dados['orientadores'] = $this->orientador_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['sub_areas'] = $this->repositorio_areas_model->get_sub_areas_by_repositorio_id($id);
        $dados['usuarios'] = $this->usuario_model->get_all();
        $dados['titulo'] = 'Editar repositório';
        $dados['view'] = 'adm/repositorios/editar';
        $dados['js'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'jquery.mask.min';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'repositorio.init';

        $this->load->view('/layout', $dados);
    }

    function salvar() {
        $this->load->library('Slug');

        // Busca as regras de validacao nos arquivos de configuracao
        $regras = $this->config->item('regras_validacao');
        // Seta as regras na library de validacao
        $this->form_validation->set_rules($regras);
        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');

        $repositorio = new stdClass();

        $id = $this->input->post('id');
        $repositorio->rep_nome = $this->input->post('nome');
        $repositorio->rep_descricao = $this->input->post('descricao');
        $repositorio->rep_autor = $this->input->post('autor');
        $repositorio->rep_autor_email = $this->input->post('autor_email');
        $repositorio->rep_data = $this->input->post('data');

        $repositorio->orientadores_ori_id = $this->input->post('orientadores_ori_id');
        $repositorio->usuarios_usu_id = $this->input->post('usuarios_usu_id');
        $sub_areas = $this->input->post('sub_areas');

        if (!$this->form_validation->run() === FALSE) {

            // Caso os dados sejam invalidos exibe o formulario de validacao novamente
            $repositorio->rep_id = $id;
            $dados['repositorios'] = $repositorio;
            $dados['orientadores'] = $this->orientador_model->get_all();
            $dados['usuarios'] = $this->usuario_model->get_all();
            $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();

            $dados['titulo'] = 'Editar repositório';
            $dados['view'] = 'adm/repositorios/editar';
            $dados['css'][] = 'fileinput.min';
            $dados['css'][] = 'bootstrap-multiselect';
            $dados['js'][] = 'bootstrap-multiselect';
            $dados['js'][] = 'upload/fileinput.min';
            $dados['js'][] = 'upload/fileinput.pt-BR';
            $dados['js'][] = 'repositorio.init';

            $this->load->view('/layout', $dados);
        }

        if (!empty($_FILES['rep_monografia']['tmp_name'])) {
            //MONOGRAFIA
            //Path para o diretório de monografia do repositorio
            //url-title cria um nome para a pasta do repositorio, sem caracteres especiais
            $diretorio = 'img/repositorio/' . url_title($repositorio->rep_nome, 'dash', true);

            $diretorio = $diretorio . '/monografia/';
            //Verifica se o diretório não existe e o cria
            if (!is_dir('./' . $diretorio)) {
                mkdir('./' . $diretorio, 0777, true);
            }

            //Configurações para o upload
            $config['upload_path'] = './' . $diretorio;
            $config['allowed_types'] = '*';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->upload->initialize($config);

            //Verifica se o upload deu certo
            if (!$this->upload->do_upload('rep_monografia')) {
                $error = array('error' => $this->upload->display_errors());
                //Validação
            } else {
                //Pega o path completo até a monografia e salva
                $img_path = $this->upload->data();
                $repositorio->rep_monografia = $diretorio . $img_path['file_name'];
            }
        }


        if (!empty($_FILES['rep_video']['tmp_name'])) {
            //VIDEO
            //Path para o diretório de video do repositorio
            //url-title cria um nome para a pasta do repositorio, sem caracteres especiais
            $diretorio = 'img/repositorio/' . url_title($repositorio->rep_nome, 'dash', true);

            $diretorio = $diretorio . '/video/';
            //Verifica se o diretório não existe e o cria
            if (!is_dir('./' . $diretorio)) {
                mkdir('./' . $diretorio, 0777, true);
            }
            //Configurações para o upload
            $config['upload_path'] = './' . $diretorio;
            $config['allowed_types'] = '*';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->upload->initialize($config);

            //Verifica se o upload deu certo
            if (!$this->upload->do_upload('rep_video')) {
                $error = array('error' => $this->upload->display_errors());
                //Validação
            } else {
                //Pega o path completo até o video e salva
                $img_path = $this->upload->data();
                $repositorio->rep_video = $diretorio . $img_path['file_name'];
            }
        }


        if (!empty($_FILES['rep_codigo_fonte']['tmp_name'])) {
            //CODIGO FONTE
            //Path para o diretório de codigos do repositorio
            //url-title cria um nome para a pasta do repositorio, sem caracteres especiais
            $diretorio = 'img/repositorio/' . url_title($repositorio->rep_nome, 'dash', true);
            $diretorio = $diretorio . '/codigo/';
            //Verifica se o diretório não existe e o cria
            if (!is_dir('./' . $diretorio)) {
                mkdir('./' . $diretorio, 0777, true);
            }

            //Configurações para o upload
            $config['upload_path'] = './' . $diretorio;
            $config['allowed_types'] = '*';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';


            $this->upload->initialize($config);

            //Verifica se o upload deu certo
            if (!$this->upload->do_upload('rep_codigo_fonte')) {
                $error = array('error' => $this->upload->display_errors());
                //Validação
            } else {
                //Pega o path completo até o codigo fonte e salva
                $img_path = $this->upload->data();
                $repositorio->rep_codigo_fonte = $diretorio . $img_path['file_name'];
            }
        }
        // Verifica se deve atualizar ou inserir o registro
        if (empty($id)) {
            $repositorio->rep_link = $this->slug->repositorio($this->input->post('nome'));
            // Caso nao seja informado o ID do registro a ser atualizado insere um novo
            $resultado = $this->repositorio_model->inserir($repositorio);
            //Adiciona as áreas do tcc
            if($sub_areas) {
                $resultado = $this->repositorio_areas_model->insert_update_repositorio_areas($sub_areas, $resultado);
            }
        } else {
            $repositorio->rep_id = $id;
            $resultado = $this->repositorio_model->atualizar($repositorio);
            if($sub_areas) {
                $resultado = $this->repositorio_areas_model->insert_update_repositorio_areas($sub_areas, $id);
            }
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
        redirect('adm/repositorios', 'refresh');
    }
    
    function remover($id = NULL){
        if($id == NULL){
            redirect('adm/repositorios', 'refresh');
        }
        
        if ($this->repositorio_areas_model->remover($id)) {
            $result = $this->repositorio_model->remover($id);
        }

        if ($result) {
            $mensagem = array('msg' => 'delete-ok', 'tipo' => 'success');
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
        }

        // Grava a mensagem numa flashdata
        $this->session->set_flashdata('msg', $mensagem);

        // Redireciona o usuario para a tela de gerenciamento
        redirect('adm/repositorios', 'refresh');
    }
}
