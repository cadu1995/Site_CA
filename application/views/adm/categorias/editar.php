<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="col-lg-12">
    <h1 class="page-header">
       Categorias
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-list"></i>  <a href="<?php echo base_url('adm/categorias');?>">Categorias</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <?php
    echo form_open(base_url('adm/categorias/salvar'), 'id="editar_categoria"'); 
        
    $categoria_id = (isset($categoria->tp_con_id))? $categoria->tp_con_id: set_value('id');
    $categoria_id = ($categoria_id === '' && isset($id))? $id: $categoria_id; 
    
    $atributos = array(
        'name'  => 'id',
        'id'    => 'id_categoria',
        'value' => (isset($categoria->tp_con_id))? $categoria->tp_con_id: $categoria_id,
        'type'  => 'hidden'
    );
    
    echo form_input($atributos);
    ?>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Nome *');
            echo form_input('nome', (isset($categoria->tp_con_titulo)? $categoria->tp_con_titulo: set_value('nome')), 'id="nome" class="form-control" required="TRUE"');
            echo form_error('nome');
            ?>
        </div> 
        
    </div>
    

    <div class="row">
    <div class="row" style="padding-top: 200px">
        <div class="form-group col-lg-6">
            <?php 
            
            echo form_submit('salvar','Salvar', 'class="btn btn-primary"');
            echo nbs(2).'<a href="'.base_url('adm/categorias').'" class="btn btn-danger btn_cancelar">Cancelar</a>&nbsp;';
            ?>
        </div>
    </div>
    
    <?php echo form_close(); ?>
    
</div> 