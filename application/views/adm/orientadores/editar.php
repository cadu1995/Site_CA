<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="col-lg-12">
    <h1 class="page-header">
       Orientadores
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-graduation-cap"></i>  <a href="<?php echo base_url('adm/orientadores');?>">Orientadores</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <?php
    echo form_open(base_url('adm/orientadores/salvar'), 'id="editar_orientador"'); 
        
    $orientador_id = (isset($orientador->ori_id))? $orientador->ori_id: set_value('id');
    $orientador_id = ($orientador_id === '' && isset($id))? $id: $orientador_id; 
    
    $atributos = array(
        'name'  => 'id',
        'id'    => 'id_orientador',
        'value' => (isset($orientador->ori_id))? $orientador->ori_id: $orientador_id,
        'type'  => 'hidden'
    );
    
    echo form_input($atributos);
    ?>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Nome *');
            echo form_input('nome', (isset($orientador->ori_nome)? $orientador->ori_nome: set_value('nome')), 'id="nome" class="form-control" required="TRUE"');
            echo form_error('nome');
            ?>
        </div> 
       
    </div>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php 
            echo form_label('E-mail *');
            echo form_input('email',(isset($orientador->ori_email)? $orientador->ori_email: set_value('email')), 'class="form-control " id="email" required="TRUE"');
            echo form_error('email');
            ?>
        </div>
    </div>
    
    <div class="row" style="padding-top: 60px">
        <div class="form-group col-lg-6">
            <?php 
            
            echo form_submit('salvar','Salvar', 'class="btn btn-primary"');

            echo nbs(2) . form_button('cancelar','Cancelar', ' class="btn btn-danger btn_cancelar" ');
            
            ?>
        </div>
    </div>
    
    <?php echo form_close(); ?>
    
</div> 