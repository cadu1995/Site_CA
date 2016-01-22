<?php

class Conteudo extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->autenticacao->verifica_acesso()) {

            redirect('adm/login');
        }

        $this->load->model(array(
            'adm/conteudo_model',
            'adm/usuario_model',
            'adm/tipo_conteudo_model',
            'adm/sub_areas_conhecimento_model',
            'adm/areas_conhecimento_model',
            'adm/conteudo_sub_area_model',
        ));

        $this->load->library('form_validation');
        $this->load->helper(array('security', 'date'));
    }

    function index() {

        $dados['conteudo'] = $this->conteudo_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['view'] = 'adm/conteudo/index';
        $dados['titulo'] = 'Gerenciar conteúdo';

        $this->load->view('/layout', $dados);
    }

    function criar() {
        $dados['tipo_conteudo'] = $this->tipo_conteudo_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['titulo'] = 'Cadastrar conteúdo';
        $dados['view'] = 'adm/conteudo/editar';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'jquery-ui.blue';
        $dados['css'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'data/jquery-ui';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][] = 'tinymce/js/tinymce/tinymce.min';
        $dados['js'][] = 'tinymce.init.min';

        $this->load->view('/layout', $dados);
    }

    function editar($id = NULL) {

        if ($id == NULL)
            redirect('adm/conteudo', 'refresh');

        $conteudo = $this->conteudo_model->get_by_id($id);

        list($ano, $mes, $dia) = explode('-', $conteudo->con_data);

        $conteudo->con_data = $dia . $mes . $ano;
        $conteudo->sub_areas = $this->conteudo_sub_area_model->get_sub_areas_by_conteudo_id($id);

        $dados['tipo_conteudo'] = $this->tipo_conteudo_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['conteudo'] = $conteudo;

        $dados['usuario'] = $this->usuario_model->get_by_id($conteudo->usuarios_usu_id);

        $dados['titulo'] = 'Editar conteúdo';
        $dados['view'] = 'adm/conteudo/editar';
        $dados['css'][] = 'jquery-ui.blue';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'data/jquery-ui';
        $dados['js'][] = 'data/jquery-1.10.2';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][] = 'tinymce/js/tinymce/tinymce.min';
        $dados['js'][] = 'tinymce.init.min';

        $this->load->view('/layout', $dados);
    }

    function salvar() {

        $conteudo = new stdClass();

        $this->form_validation->set_rules('con_data', 'data', 'required');
        $this->form_validation->set_rules('con_titulo', 'titulo', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('tipo_conteudo_tp_con_id', 'categoria', 'required');
        $this->form_validation->set_rules('con_descricao', 'conteudo', 'required');

        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');



        $id = $this->input->post('con_id');
        $conteudo->con_titulo = $this->input->post('con_titulo');
        $conteudo->con_descricao = $this->input->post('con_descricao');
        $conteudo->con_data = $this->input->post('con_data');
        $conteudo->con_data_registro = unix_to_human(now(), TRUE, 'eu');
        $conteudo->tipo_conteudo_tp_con_id = $this->input->post('tipo_conteudo_tp_con_id');
        $conteudo->usuarios_usu_id = $this->session->userdata('usuario_id');
        $sub_areas = $this->input->post('sub_areas');

        list($dia, $mes, $ano) = explode('/', $conteudo->con_data);
        $conteudo->con_data = $ano . $mes . $dia;

        if (empty($id)) {
            //Path para o diretório de imagens do conteudo
            //url-title cria um nome para a pasta do conteúdo, sem caracteres especiais
            $diretorio = 'img/conteudo/' . url_title($conteudo->con_titulo, 'dash', true);

            //Verifica se o diretório não existe e o cria
            if (!is_dir('./' . $diretorio)) {
                mkdir('./' . $diretorio, 0777, true);
            }

            //Configurações para o upload
            $config['upload_path'] = './' . $diretorio;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2500';
            $config['max_width'] = '2000';
            $config['max_height'] = '1500';

            $this->upload->initialize($config);

            //Verifica se o upload deu certo
            if (!$this->upload->do_upload('con_imagem')) {
                $error = array('error' => $this->upload->display_errors());
                //Validação
            } else {
                //Pega o path completo até a imagem e salva
                $img_path = $this->upload->data();
                $conteudo->con_imagem = $diretorio . '/' . $img_path['file_name'];
            }

            $upimg['resize'] = array(
                'source_image' => $conteudo->con_imagem,
                'image_library' => 'gd2',
                'maintain_ratio' => FALSE,
                'width' => 1366,
                'height' => 768,
            );

            $this->load->library('image_lib', $upimg['resize']);

            if (!$this->image_lib->resize()) {
                echo '<pre>';
                print_r($this->image_lib->display_errors());
                die('</pre>');
            }

            $resultado = $this->conteudo_model->criar($conteudo);
            if ($sub_areas) {
                $resultado = $this->conteudo_sub_area_model->insert_update_conteudo_areas($sub_areas, $resultado);
            }
        } else {

            $conteudo->con_id = $id;
            $resultado = $this->conteudo_model->atualizar($conteudo);
            if ($sub_areas) {
                $resultado = $this->conteudo_sub_area_model->insert_update_conteudo_areas($sub_areas, $id);
            }
        }

        if ($resultado) {

            if (empty($id)) {

                $mensagem = array('msg' => 'insert-con-ok', 'tipo' => 'success');
            } else {

                $mensagem = array('msg' => 'update-con-ok', 'tipo' => 'info');
            }
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
        }

        $this->session->set_flashdata('msg', $mensagem);

        redirect('adm/conteudo', 'refresh');
    }

    function remover($id = NULL) {
        if ($id === \NULL) {
            redirect('adm/conteudo', 'refresh');
        }

        $this->conteudo_sub_area_model->remover($id);

        $resultado = $this->conteudo_model->remover($id);

        if ($resultado) {

            $mensagem = array('msg' => 'delete-con-ok', 'tipo' => 'success');
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
        }

        $this->session->set_flashdata('msg', $mensagem);

        redirect('adm/conteudo', 'refresh');
    }

}

/*
 *echo '<pre>';
        print_r($conteudo);
        echo '</pre>';
        die();
*/