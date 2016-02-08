<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-lg-12">
    <?php echo _mensagem_flashdata();?>
    <h1 class="page-header">
       Finanças
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-university"></i>  <a href="<?php echo base_url('adm/financas');?>">Finanças</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> <?php echo $titulo = 'Gerenciar Finanças';?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if($this->session->userdata('grupos') == 1): ?>
            <a class="btn btn-primary" href="<?php echo base_url('adm/financas/cadastrar'); ?>">Cadastrar</a>
            <?php endif; ?>
        </div> 
        <div class="panel-body">

            <?php
            
       
            
            if($this->session->userdata('grupos') == 1){
                $this->table->set_heading('Id', 'Descrição', 'Tipo', 'Valor', 'Ações');
            }else{
                $this->table->set_heading('Id', 'Descrição', 'Tipo', 'Valor');
            }
             
            if(isset($financas) && !empty($financas)){
                foreach ($financas as $u) {                

                    $link_editar  = base_url('adm/financas/editar/' . $u->fin_id);

                    $acoes  = '<a href="' . $link_editar . '" class="btn btn-info btn-sm">Editar</a>&nbsp;';
                    $acoes .= '<a href="' . base_url('adm/financas/remover/'.$u->fin_id) . '" class="btn btn-danger btn-sm btn_remover">Remover</a>';
                    
                     if($this->session->userdata('grupos') == 1){
                        $this->table->add_row(
                                $u->fin_id, $u->fin_descricao, $u->fin_tipo, $u->fin_valor, $acoes
                        );
                     }else{
                         $this->table->add_row(
                                $u->fin_id, $u->fin_descricao, $u->fin_tipo, $u->fin_valor
                        );
                     }
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
                <h4 class="modal-title" id="myModalLabel">Remover Finança</h4>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja remover esta finança?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Não</a>
                <a href="<?php echo base_url('adm/financas/remover/'); ?>" id="confirma_remocao" class="btn btn-primary">Sim</a>
            </div>
        </div>
    </div>
</div>