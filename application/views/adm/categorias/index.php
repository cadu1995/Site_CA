<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-lg-12">
    <?php echo _mensagem_flashdata();?>
    <h1 class="page-header">
       Categorias
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-university"></i>  <a href="<?php echo base_url('adm/categorias');?>">Categorias</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> <?php echo $titulo = 'Gerenciar Categorias';?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="btn btn-primary" href="<?php echo base_url('adm/categorias/cadastrar'); ?>">Cadastrar</a>
        </div> 
        <div class="panel-body">

            <?php
            
       
            

             $this->table->set_heading('Id', 'Nome','Ações');

            foreach ($categorias as $u) {                

                $link_editar  = base_url('adm/categorias/editar/' . $u->tp_con_id);
                
                $acoes  = '<a href="' . $link_editar . '" class="btn btn-info btn-sm">Editar</a>&nbsp;';
//                $acoes .= '<a class="btn btn-danger btn-sm" href="javascript:func()" onclick="conf_excluir('.$u->tp_con_id.')">Remover</a>';
                $acoes .= '<a href="' . base_url('adm/categorias/remover/'.$u->tp_con_id) . '" class="btn btn-danger btn-sm btn_remover">Remover</a>';
                
                $this->table->add_row(
                        $u->tp_con_id, $u->tp_con_titulo, $acoes
                );
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
                <h4 class="modal-title" id="myModalLabel">Remover Categoria</h4>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja remover esta categoria?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Não</a>
                <a href="<?php echo base_url('adm/categorias/remover/'); ?>" id="confirma_remocao" class="btn btn-primary">Sim</a>
            </div>
        </div>
    </div>
</div>