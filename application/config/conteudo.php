<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$config['regras_validacao'] = array(
    array(
        'field' => 'con_titulo',
        'label' => 'título',
        'rules' => 'trim|required'
    ),
    array(
        'field' => 'con_subtitulo',
        'label' => 'subítulo',
        'rules' => 'trim|required'
    ),
    array(
        'field' => 'con_data',
        'label' => 'data',
        'rules' => 'trim|required'
    ),
    array(
        'field' => 'con_descricao',
        'label' => 'texto',
        'rules' => 'trim|required'
    ),
);
