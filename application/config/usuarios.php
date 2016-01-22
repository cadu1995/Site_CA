<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

$config['status_usuario'] = array(
    0 => 'Inativo',
    1 => 'Ativo'
);

$config['sexo'] = array(
    0 => 'Masculino',
    1 => 'Feminino'
);


$config['regras_validacao'] = array(
    array(
        'field' => 'matricula',
        'label' => 'matricula',
        'rules' => 'trim|required'
    ),
    array(
        'field' => 'nome',
        'label' => 'nome',
        'rules' => 'trim|required'
    ),
);
