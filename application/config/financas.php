<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

$config['regras_validacao'] = array(
    array(
        'field' => 'descricao',
        'label' => 'Descrição',
        'rules' => 'trim|required'
    ),
);
