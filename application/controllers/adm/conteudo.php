<?php

/**
 * Description of historia
 *
 * @author ronieri
 */
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
        $this->load->config('conteudo');
        $this->load->helper(array('security', 'date'));
    }

    function index() {

        $dados['conteudo'] = $this->conteudo_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['view'] = 'adm/conteudo/index';
        $dados['titulo'] = 'Gerenciar conteúdo';

        $this->load->view('/layout', $dados);
    }

    function cadastrar() {
        $dados['tipo_conteudo'] = $this->tipo_conteudo_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        
        $dados['titulo'] = 'Cadastrar conteúdo';
        $dados['view'] = 'adm/conteudo/editar';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'jquery-ui.blue';
        $dados['css'][] = 'bootstrap-multiselect';
        $dados['css'][] = 'bootstrap-switch';
        $dados['js'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'data/jquery-ui';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][] = 'bootstrap-switch';
        $dados['js'][] = 'tinymce/js/tinymce/tinymce.min';
        $dados['js'][] = 'tinymce.init.min';

        $this->load->view('/layout', $dados);
    }

    function editar($id = NULL) {
        //Verifica se a função recebeu parâmetros
        if ($id === \NULL) {
            redirect('adm/conteudo', 'refresh');
        }
        
        //Pega todo o conteúdo
        $conteudo = $this->conteudo_model->get_by_id($id);
        if (empty($conteudo)) {
            redirect('adm/conteudo', 'refresh');
        }
        //Modifica a exibição das datas
        list($ano, $mes, $dia) = explode('-', $conteudo->con_data);
        $conteudo->con_data = $dia . $mes . $ano;
        
        //Carrega as sub-áreas do conteúdo
        $conteudo->sub_areas = $this->conteudo_sub_area_model->get_sub_areas_by_conteudo_id($id);
        
        $dados['tipo_conteudo'] = $this->tipo_conteudo_model->get_all();
        $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
        $dados['conteudo'] = $conteudo;

        $dados['usuario'] = $this->usuario_model->get_by_id($conteudo->usuarios_usu_id);

        //Informações da página, css e js necessários
        $dados['titulo'] = 'Editar conteúdo';
        $dados['view'] = 'adm/conteudo/editar';
        $dados['css'][] = 'jquery-ui.blue';
        $dados['css'][] = 'fileinput.min';
        $dados['css'][] = 'bootstrap-switch';
        $dados['css'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'bootstrap-multiselect';
        $dados['js'][] = 'data/jquery-ui';
        $dados['js'][] = 'plugins/jquery.validate';
        $dados['js'][] = 'upload/fileinput.min';
        $dados['js'][] = 'upload/fileinput.pt-BR';
        $dados['js'][] = 'bootstrap-switch';
        $dados['js'][] = 'jquery.mask.min';
        $dados['js'][] = 'tinymce/js/tinymce/tinymce.min';
        $dados['js'][] = 'tinymce.init.min';
        
        //Exibe a view
        $this->load->view('/layout', $dados);
    }

    function salvar() {
        // Busca as regras de validacao nos arquivos de configuracao
        $regras = $this->config->item('regras_validacao');

        // Seta as regras na library de validacao
        $this->form_validation->set_rules($regras);

        // Seta o html das mensagens de validacao
        $this->form_validation->set_error_delimiters('<label class="control-label" for="inputError">', '</label>');
        
        $this->load->library('Slug');
        $conteudo = new stdClass();

        //Pega o id separado para saber se é edição ou criação
        $id = $this->input->post('con_id');
        
        $conteudo->con_titulo              = $this->input->post('con_titulo');
        $conteudo->con_subtitulo           = $this->input->post('con_subtitulo');
        $conteudo->con_destaque            = $this->input->post('con_destaque');
        $conteudo->con_descricao           = $this->input->post('con_descricao');
        $conteudo->con_data                = $this->input->post('con_data');
        $conteudo->con_data_registro       = unix_to_human(now(), TRUE, 'eu');
        $conteudo->tipo_conteudo_tp_con_id = $this->input->post('tipo_conteudo_tp_con_id');
        $conteudo->usuarios_usu_id         = $this->session->userdata('usuario_id');
        $sub_areas                         = $this->input->post('sub_areas');
        
        if ($this->form_validation->run() === FALSE) {
            $conteudo->con_id = $id;

            //Carrega as sub-áreas do conteúdo
            if (is_array($sub_areas)) {
                foreach ($sub_areas as $s) {
                    $aux = new stdClass();
                    $aux->sub_area_id = $s;
                    $sub[] = $aux;
                }
            }
            $conteudo->sub_areas = $sub;

            $dados['tipo_conteudo'] = $this->tipo_conteudo_model->get_all();
            $dados['areas_conhecimento'] = $this->sub_areas_conhecimento_model->get_sub_areas_group_by_areas();
            $dados['conteudo'] = $conteudo;

            $dados['usuario'] = $this->usuario_model->get_by_id($conteudo->usuarios_usu_id);

            //Informações da página, css e js necessários
            $dados['titulo'] = 'Editar conteúdo';
            $dados['view'] = 'adm/conteudo/editar';
            $dados['css'][] = 'jquery-ui.blue';
            $dados['css'][] = 'fileinput.min';
            $dados['css'][] = 'bootstrap-switch';
            $dados['css'][] = 'bootstrap-multiselect';
            $dados['js'][] = 'bootstrap-multiselect';
            $dados['js'][] = 'data/jquery-ui';
            $dados['js'][] = 'plugins/jquery.validate';
            $dados['js'][] = 'upload/fileinput.min';
            $dados['js'][] = 'upload/fileinput.pt-BR';
            $dados['js'][] = 'bootstrap-switch';
            $dados['js'][] = 'jquery.mask.min';
            $dados['js'][] = 'tinymce/js/tinymce/tinymce.min';
            $dados['js'][] = 'tinymce.init.min';

            //Exibe a view
            $this->load->view('/layout', $dados);
        }else{
            //Arruma a data na forma do banco
            list($dia, $mes, $ano) = explode('/', $conteudo->con_data);
            $conteudo->con_data = $ano . $mes . $dia;

            //Se o id for vazio, é criação de conteúdo
            if (empty($id)) {
                //Path para o diretório de imagens do conteudo
                //url-title cria um nome para a pasta do conteúdo, sem caracteres especiais
                if(!empty($_FILES['con_imagem']['tmp_name'])){
                    $diretorio = 'img/conteudo/' . url_title($conteudo->con_titulo, 'dash', true);

                    $conteudo->con_imagem = $this->upload($diretorio);
                }

                //Cria o novo conteúdo
                $conteudo->con_link = $this->slug->conteudo($this->input->post('con_titulo'));
                $resultado = $this->conteudo_model->cadastrar($conteudo);
                //Verifica se foi(ram) selecionada(s) áreas de conhecimento e as adicionam
                if ($sub_areas) {
                    $resultado = $this->conteudo_sub_area_model->insert_update_conteudo_areas($sub_areas, $resultado);
                }

            } else {
                //Atualização do conteúdo

                //Path para o diretório de imagens do conteudo
                //url-title cria um nome para a pasta do conteúdo, sem caracteres especiais
                if(!empty($_FILES['con_imagem']['tmp_name'])){
                    $diretorio = 'img/conteudo/' . url_title($conteudo->con_titulo, 'dash', true);

                    $conteudo->con_imagem = $this->upload($diretorio);
                }
                
                $conteudo->con_id = $id;
                $resultado = $this->conteudo_model->atualizar($conteudo);
                if ($sub_areas) {
                    $resultado = $this->conteudo_sub_area_model->insert_update_conteudo_areas($sub_areas, $id);
                }
            }
        
            //Verificação
            if ($resultado) {

                if (empty($id)) {

                    $mensagem = array('msg' => 'insert-con-ok', 'tipo' => 'success');
                } else {

                    $mensagem = array('msg' => 'update-con-ok', 'tipo' => 'info');
                }
            } else {
                $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
            }

            //Seta flash data para exibir o status da operação
            $this->session->set_flashdata('msg', $mensagem);

            redirect('adm/conteudo', 'refresh');
        }
    }

    function remover($id = NULL) {
        //Verifica se a função recebeu parâmetros
        if ($id === \NULL) {
            redirect('adm/conteudo', 'refresh');
        }
        
        //Remove as chves de subáreas
        $this->conteudo_sub_area_model->remover($id);
        //Remove o conteúdo
        $resultado = $this->conteudo_model->remover($id);
        
        
        //Verificação
        if ($resultado) {

            $mensagem = array('msg' => 'delete-con-ok', 'tipo' => 'success');
        } else {
            $mensagem = array('msg' => 'erro', 'tipo' => 'danger');
        }
        
        //Seta flash data para exibir o status da operação
        $this->session->set_flashdata('msg', $mensagem);

        redirect('adm/conteudo', 'refresh');
    }
    
    private function upload($diretorio){
        $path = "";

        //Verifica se o diretório não existe e o cria
        if (!is_dir('./' . $diretorio)) {
            mkdir('./' . $diretorio, 0777, true);
        }

        //Configurações para o upload
        $config['upload_path'] = './' . $diretorio;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';

        $this->upload->initialize($config);

        //Verifica se o upload deu certo
        if (!$this->upload->do_upload('con_imagem')) {
            $error = array('error' => $this->upload->display_errors());
            //Validação
        } else {
            //Pega o path completo até a imagem e salva
            $img_path = $this->upload->data();
            $path = $diretorio . '/' . $img_path['file_name'];
        }
        
        //Parâmetros para redimensionar a imagem do post
        $upimg['resize'] = array(
            'source_image' => $path,
            'image_library' => 'gd2',
            'maintain_ratio' => FALSE,
            'width' => 1366,
            'height' => 768,
        );

        //Carrega a biblioteca de imagem e aplica o redimensionamento
        $this->load->library('image_lib', $upimg['resize']);
        $this->image_lib->resize();
        
        return $path;
    }
}