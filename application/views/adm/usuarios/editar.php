<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="col-lg-12">
    <h1 class="page-header">
       Usuários
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="usuarios">Usuários</a>
        </li>
        <li class="active">
            <i class="fa fa-file"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <?php
    echo form_open(base_url('adm/usuarios/salvar'), 'id="editar_usuario"'); 
        
    $usuario_id = (isset($usuario->usu_id))? $usuario->usu_id: set_value('id');
    $usuario_id = ($usuario_id === '' && isset($id))? $id: $usuario_id; 
    
    $atributos = array(
        'name'  => 'id',
        'id'    => 'id_usuario',
        'value' => (isset($usuario->usu_id))? $usuario->usu_id: $usuario_id,
        'type'  => 'hidden'
    );
    
    echo form_input($atributos);
    ?>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Nome *');
            echo form_input('nome', (isset($usuario->usu_nome)? $usuario->usu_nome: set_value('nome')), 'id="nome" class="form-control" required="TRUE"');
            echo form_error('nome');
            ?>
        </div> 
        <div class="form-group col-lg-3">
            <?php
            echo form_label('Telefone');
            echo form_input('telefone', (isset($usuario->usu_telefone)? $usuario->usu_telefone: set_value('telefone')), 'class="form-control telefone " id="telefone"');
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php 
            echo form_label('E-mail *');
            echo form_input('email',(isset($usuario->usu_email)? $usuario->usu_email: set_value('email')), 'class="form-control " id="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required="TRUE" title="example@example.com"');
            echo form_error('email');
            ?>
        </div>
        <div class="form-group col-lg-3">
            <?php 

            echo form_label('Matricula *');
            echo form_input('matricula',(isset($usuario->usu_matricula)? $usuario->usu_matricula: set_value('matricula')), 'class="form-control " id="matricula" pattern="[0-9]{8,}" required="TRUE" title="Matrícula inválida."');
            echo form_error('matricula');
            ?>
        </div>
        
    </div>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php 

            echo form_label('Senha');
            echo form_password('senha','', ' id="senha" class="form-control " pattern=".{6,}" title="No mínimo seis caracteres."');
            echo form_error('senha');
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-lg-3">
            <?php 
            echo form_label('Data de Nascimento');
            echo form_input('data_nascimento',(isset($usuario->usu_data_nascimento)? $usuario->usu_data_nascimento: set_value('data_nascimento')), 'class="form-control " id="data_nascimento"');
            echo form_error('data_nascimento');
            ?>
        </div>
        <div class="form-group col-lg-3">
            <?php 

            echo form_label('Sexo *');

            $status_usuario = $this->config->item('sexo');

            echo form_dropdown('sexo',$status_usuario,(isset($usuario->usu_sexo)? $usuario->usu_sexo: set_value('sexo')),'class="form-control"');
            echo form_error('sexo');
            ?>
        </div>
        
    </div>
    <div class="row">
        <div class="form-group col-lg-3">
            <?php 

            echo form_label('Status *');

            $status_usuario = $this->config->item('status_usuario');

            echo form_dropdown('status',$status_usuario,(isset($usuario->usu_status)? $usuario->usu_status: set_value('status')),'class="form-control"');
            echo form_error('status');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3 div-grupos" name="grupo" id="grupo">
            <?php 

             function pertenceGrupo($grupos_usuario, $grupo) {
                 
                foreach ($grupos_usuario as $g) {

                    if ($g === $grupo) {
                        return TRUE;
                    }
                }

                return FALSE;
            };
            
            

            echo form_label('Grupos *');
            
            foreach ($grupos as $g) {
                $checked = false;
                if(isset($usuario)){
                    if($g->gru_id == $usuario->grupos_gru_id){
                        $checked = true;
                    }else{
                        $checked =  false;
                    }
                } 
                
                $atributos = array(
                    'name'    => 'grupos',
                    'id'      => $g->gru_id,                    
                    'value'   => $g->gru_id,
                    'class'   => 'grupo',
                    'checked' => $checked
                );
   
          echo '<div class="checkbox"><label>' . form_radio($atributos) . '&nbsp;' . $g->gru_nome . '</label></div>';
                
            }
   
      
            ?>
            <label for="grupos" class="" style="display: none;" id="msg_verifica_grupos">&nbsp;Selecione ao menos um grupo.</label>
        </div>
    
    
    <div class="row" style="padding-top: 200px">
        <div class="form-group col-lg-6">
            <?php 
            
            echo form_submit('salvar','Salvar', 'class="btn btn-primary"');

            echo nbs(2) . form_button('cancelar','Cancelar', ' class="btn btn-danger btn_cancelar" ');
            ?>
        </div>
    </div>
    
    <?php echo form_close(); ?>
    
</div> 