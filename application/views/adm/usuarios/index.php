<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-lg-12">
    <?php echo _mensagem_flashdata();?>
    <h1 class="page-header">
       Usuários
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-user"></i>  <a href="usuarios">Usuários</a>
        </li>
        <li class="active">
            <i class="fa fa-pencil"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="btn btn-primary" href="<?php echo base_url('adm/usuarios/cadastrar'); ?>">Cadastrar</a>
        </div> 
        <div class="panel-body">

            <?php
            
            function formata_status($status){
              
                $html_status = '<span class="label ';
                
                switch($status){
                    
                    case 1:{
                        $html_status .= 'label-success">Ativo';
                    }break;             
                    case 0:{
                        $html_status .= 'label-danger">Inativo';
                    }break;                   
                }
                
                $html_status .= '</span>';
                
                return $html_status;
            };
            

            $this->table->set_heading('Id', 'Nome', 'E-mail', 'Status', 'Ações');
            
            if(isset($usuarios) && !empty($usuarios)){
                foreach ($usuarios as $u) {                

                    $link_editar  = base_url('adm/usuarios/editar/' . $u->usu_id);

                    $acoes  = '<a href="' . $link_editar . '" class="btn btn-info btn-sm">Editar</a>&nbsp;';
                    $acoes .= '<a href="'.base_url('adm/usuarios/remover/'.$u->usu_id).'" data-id="' . $u->usu_id . '" class="btn btn-danger btn-sm btn_remover">Remover</a>';

                    $this->table->add_row(
                            $u->usu_id, $u->usu_nome, $u->usu_email, formata_status($u->usu_status), $acoes
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
                <h4 class="modal-title" id="myModalLabel">Remover usuário</h4>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja remover este usuário?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Não</a>
                <a href="<?php echo base_url('adm/usuarios/remover/'); ?>" id="confirma_remocao" class="btn btn-primary">Sim</a>
            </div>
        </div>
    </div>
</div>