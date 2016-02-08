<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-lg-12">
    <?php echo _mensagem_flashdata();?>
    <h1 class="page-header">
       Orientadores
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-graduation-cap"></i>  <a href="<?php echo base_url('adm/orientadores');?>">Orientadores</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="btn btn-primary" href="<?php echo base_url('adm/orientadores/cadastrar'); ?>">Cadastrar</a>
        </div> 
        <div class="panel-body">

            <?php
           
            $this->table->set_heading('Id', 'Nome', 'E-mail', 'Ações');

            if(isset($orientadores) && !empty($orientadores)){
                foreach ($orientadores as $o) {                

                    $link_editar  = base_url('adm/orientadores/editar/' . $o->ori_id);

                    $acoes  = '<a href="'.$link_editar.'" class="btn btn-info btn-sm">Editar</a>&nbsp;';
                    $acoes .= '<a href="'.base_url('adm/orientadores/remover/').'/'.$o->ori_id.'" data-id="' . $o->ori_id . '" class="btn btn-danger btn-sm btn_remover">Remover</a>';

                    $this->table->add_row(
                            $o->ori_id, $o->ori_nome, $o->ori_email, $acoes
                    );
                }
            }
            $this->table->set_template(array(
                'table_open' => '<table class="table table-striped table-bordered table-hover">',
            ));

            echo $this->table->generate();
            ?>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_confirmar_remocao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Remover orientador</h4>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja remover este orientador?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Não</a>
                <a href="<?php echo base_url('adm/orientadores/remover/'); ?>" id="confirma_remocao" class="btn btn-primary">Sim</a>
            </div>
        </div>
    </div>
</div>