<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

$config['regras_validacao'] = array(
     array(
        'field' => 'Nome',
        'label' => 'Nome',
        'rules' => 'trim|required'
    ),
);
