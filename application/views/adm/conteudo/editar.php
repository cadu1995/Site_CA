<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<div class="col-lg-12">
    <h1 class="page-header">
       Conteúdo
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file-text"></i>  <a href="<?php echo base_url('adm/conteudo/');?>">Conteúdo</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <?php
    echo form_open_multipart(base_url('adm/conteudo/salvar'), 'id="editar_conteudo"'); 
        
    $conteudo_id = (isset($conteudo->con_id))? $conteudo->con_id: set_value('id');
    $conteudo_id = ($conteudo_id === '' && isset($id))? $id: $conteudo_id; 
    
    $atributos = array(
        'name'  => 'con_id',
        'id'    => 'con_id',
        'value' => (isset($conteudo->con_id))? $conteudo->con_id: $conteudo_id,
        'type'  => 'hidden'
    );
    
    echo form_input($atributos);
    ?>
    
    <div class="row">
        
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Título *');
            echo form_input('con_titulo', (isset($conteudo->con_titulo)? $conteudo->con_titulo: set_value('Título')), 'id="con_titulo" class="form-control" required="TRUE"');
            echo form_error('con_titulo');
            ?>
        </div>
        
        
        <div class="form-group col-lg-3">
            <?php
            
            $tipos = array();
            
            foreach($tipo_conteudo as $tp){
                $tipos[$tp->tp_con_id] = $tp->tp_con_titulo;
            }
            
            echo form_label('Categoria *');

            echo form_dropdown('tipo_conteudo_tp_con_id', $tipos, (isset($conteudo->tipo_conteudo_tp_con_id)? $conteudo->tipo_conteudo_tp_con_id: set_value('categoria')),'class="form-control"');
            echo form_error('tipo_conteudo_tp_con_id');
            ?>
        </div>
    </div>
    
    <div class="row">
        
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Sub título *');
            echo form_input('con_subtitulo', (isset($conteudo->con_subtitulo)? $conteudo->con_subtitulo: set_value('Sub título')), 'id="con_subtitulo" class="form-control" required="TRUE"');
            echo form_error('con_subtitulo');
            ?>
        </div>
        
        
        <div class="form-group col-lg-3">
            <?php
                        echo br(1);
            if(isset($conteudo)){
                if($conteudo->con_destaque == 1){
                    $checked = TRUE;
                }else {
                    $checked = FALSE;
                }
            }else{
                $checked = FALSE;
            }
            
            echo form_label('Destaque &nbsp');

            echo form_checkbox('con_destaque', '1', $checked);
            echo form_error('con_destaque');
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php 
            echo form_label('Autor');
            echo form_input('autor', (isset($usuario->usu_nome)? $usuario->usu_nome: $this->session->userdata('nome')), 'class="form-control" id="autor" readonly="true"');
            echo form_error('autor');
            ?>
        </div>
        <div class="form-group col-lg-3">
            <?php 

            echo form_label('Data *');
            echo form_input('con_data',(isset($conteudo->con_data)? $conteudo->con_data: set_value('data')), 'class="form-control" id="con_data" required="TRUE"');
            echo form_error('con_data');
            
            ?>
        </div>
    </div>
    <div class="row">
        <?php
                    if (!isset($conteudo->con_imagem)) {
            echo '<div class="form-group col-lg-6 ">';
            echo form_label('Imagem');
            echo '<input type="file" name="con_imagem" id="con_imagem" value="" >
                </div>
                ';
            echo '<div class="form-group col-lg-3">';
        } else {
            echo '<div class="form-group col-lg-6">';
        }
        echo form_label('Áreas ');
        $areas_conhecimento = $areas_conhecimento->sub_areas;

        echo '<select id="sub_areas" name="sub_areas[]" multiple="multiple" class="form-control multiselect-container">';
        foreach ($areas_conhecimento as $areas) {
            echo '<optgroup label="' . $areas->are_nome . '">';
            foreach ($areas->sub_areas as $sub) {
                if (!empty($conteudo->sub_areas)) {
                    $selected = '';
                    foreach ($conteudo->sub_areas as $csa) {
                        if ($sub->sub_area_id == $csa->sub_area_id) {

                            $selected = 'selected="selected"';
                        }
                    }
                } else {
                    $selected = '';
                }
                echo '<option value="' . $sub->sub_area_id . '" ' . $selected . '>' . $sub->sub_area_titulo . '</option>';
            }
        }
        echo '</select>';
        echo form_error('sub_areas');
        ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-lg-12">
            <?php 

            echo form_textarea('con_descricao',(isset($conteudo->con_descricao)? $conteudo->con_descricao: set_value('con_descricao')), 'class="form-control " id="con_descricao"');
            echo form_error('con_descricao');
            ?>
        </div>
    </div>
    
    
    <div class="row" style="padding-top: 80px">
        <div class="form-group col-lg-6">
            <?php 
             $redirect = 'class="btn btn-danger btn_cancelar" onclick="location.href=\''.base_url('adm/conteudo/').'\'"';
            echo form_submit('salvar','Salvar', 'class="btn btn-primary"');

            echo nbs(2) . form_button('cancelar','Cancelar', $redirect);
            ?>
        </div>
    </div>
    
    <?php echo form_close(); ?>
    
</div>