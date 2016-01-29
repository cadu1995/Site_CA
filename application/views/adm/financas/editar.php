<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-lg-12">
    <h1 class="page-header">
        Finanças
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="financas">Finanças</a>
        </li>
        <li class="active">
            <i class="fa fa-file"></i> <?php echo $titulo; ?>
        </li>
    </ol>

</div>
<div class="col-lg-12">
    <?php
    echo form_open(base_url('adm/financas/salvar'), 'enctype="multipart/form-data" id="editar_financa"');

    $financa_id = (isset($financa->fin_id)) ? $financa->fin_id : set_value('id');
    $financa_id = ($financa_id === '' && isset($id)) ? $id : $financa_id;

    $atributos = array(
        'name' => 'id',
        'id' => 'id_financa',
        'value' => (isset($financa->fin_id)) ? $financa->fin_id : $financa_id,
        'type' => 'hidden'
    );

    echo form_input($atributos);
    ?>

    <div class="row">
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Descrição *');
            echo form_textarea('descricao', (isset($financa->fin_descricao) ? $financa->fin_descricao : set_value('descricao')), 'id="descricao" style = "height: 80px" class="form-control" required="TRUE"');
            echo form_error('descricao');
            ?>
        </div>

        <div class="form-group col-lg-3">
            <?php
            echo form_label('Data');
            echo form_input('data', (isset($financa->fin_data) ? $financa->fin_data : set_value('data')), 'class="form-control " id="data"');
            echo form_error('data');
            ?>
        </div>

    </div>

    <div class="row">
        <div class="form-group col-lg-3">
            <?php
            echo form_label('Tipo');
            echo form_input('tipo', (isset($financa->fin_tipo) ? $financa->fin_tipo : set_value('tipo')), 'class="form-control tipo " id="tipo"');
            ?>
        </div>

        <div class="form-group col-lg-3">
            <?php
            echo form_label('Valor');
            echo form_input('valor', (isset($financa->fin_valor) ? $financa->fin_valor : set_value('valor')), 'class="form-control valor " id="valor"');
            ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Imagem');
            echo '<input type="file" name="fin_imagem[]" multiple id="fin_imagem" value="" >';
            echo form_error('Imagem');
            ?>
        </div>

    </div>


    <div class="row">
        <div class="row" style="padding-top: 200px">
            <div class="form-group col-lg-6">
                <?php
                echo form_submit('salvar', 'Salvar', 'class="btn btn-primary"');
                echo nbs(2) . '<a href="' . base_url('adm/financas') . '" class="btn btn-danger btn_cancelar">Cancelar</a>&nbsp;';
                ?>
            </div>
        </div>

        <?php echo form_close(); ?>

    </div> 