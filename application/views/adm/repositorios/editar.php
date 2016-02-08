<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>


<div class="col-lg-12">
    <h1 class="page-header">
       Repositório
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-database"></i>  <a href="<?php echo base_url('adm/repositorios');?>">Repositórios</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> <?php echo $titulo;?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <?php
    echo form_open(base_url('adm/repositorios/salvar'), 'enctype="multipart/form-data" id="editar_repositorio"'); 
        
    $repositorio_id = (isset($rep->rep_id))? $repositorio->rep_id: set_value('id');
    $repositorio_id = ($repositorio_id === '' && isset($id))? $id: $repositorio_id; 
    
    $atributos = array(
        'name'  => 'id',
        'id'    => 'id_repositorio',
        'value' => (isset($repositorio->rep_id))? $repositorio->rep_id: $repositorio_id,
        'type'  => 'hidden'
    );
    
    echo form_input($atributos);
    ?>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Nome *');
            if(empty($repositorio->rep_nome)){
                echo form_input('nome', (isset($repositorio->rep_nome)? $repositorio->rep_nome: set_value('nome')), 'id="nome" class="form-control" required="TRUE"');
            }else{
                echo form_label('Caso necessite alterar o nome, exclua o registro e cadastre o novamente.');
                echo form_hidden('nome',(isset($repositorio->rep_nome)? $repositorio->rep_nome: set_value('nome')), 'id="nome" class="form-control" required="TRUE"' );
            }
            echo form_error('nome');
            ?>
        </div> 
        <div class="form-group col-lg-3">
            <?php
            echo form_label('Áreas ');
            $areas_conhecimento = $areas_conhecimento->sub_areas;
            echo '<select id="sub_areas" name="sub_areas[]" multiple="multiple" class="form-control multiselect-container">';
            foreach ($areas_conhecimento as $areas) {
                echo '<optgroup label="' . $areas->are_nome . '">';
                foreach ($areas->sub_areas as $sub) {
                    if (!empty($sub_areas)) {
                        $selected = '';
                        foreach ($sub_areas as $sa) {
                            if ($sub->sub_area_id == $sa->areas_conhecimento_are_id) {

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
        <div class="form-group col-lg-6">
            <?php
            echo form_label('Resumo *');
            echo form_textarea('descricao', (isset($repositorio->rep_descricao)? $repositorio->rep_descricao: set_value('descricao')), 'class="form-control descricao " id="descricao" required="TRUE"');
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-lg-6">
            <?php 
            echo form_label('Autor *');
            echo form_input('autor',(isset($repositorio->rep_autor)? $repositorio->rep_autor: set_value('autor')), 'class="form-control " id="autor" required="TRUE"');
            echo form_error('autor');
            ?>
        </div>
        <div class="form-group col-lg-3">
            <?php 

            echo form_label('Email Autor *');
            echo form_input('autor_email',(isset($repositorio->rep_autor_email)? $repositorio->rep_autor_email: set_value('autor_email')), 'class="form-control " id="autor_email" required="TRUE"');
            echo form_error('autor_email');
            ?>
        </div>
        
    </div>
    
    <div class="row">
        <div class="form-group col-lg-6 div-grupos" name="usuario" id="usuario">
            <?php 
             function pertenceUsuario($usuarios_repositorio, $usuario) {
                 
                foreach ($usuarios_repositorio as $u) {
                    if ($u === $usuario) {
                        return TRUE;
                    }
                }
                return FALSE;
            };
            
            $usuarios_array = array('');
            
            foreach($usuarios as $usuario){
                $usuarios_array[$usuario->usu_id] = $usuario->usu_nome;
            }
            
            echo form_label('Usuario *');

            echo form_dropdown('usuarios_usu_id', $usuarios_array, (isset($repositorio->usuarios_usu_id)? $repositorio->usuarios_usu_id: set_value('usuarios')),'class="form-control"');
            echo form_error('usuarios_usu_id');    
            ?>
            
            <label for="usuarios" class="" style="display: none;" id="msg_verifica_usuarios">&nbsp;Selecione ao menos um grupo.</label>
        </div>
    </div>
        
        
        
    <div class="row">
        <div class="form-group col-lg-6 div-grupos" name="orientador" id="orientador">
            <?php 

             function pertenceGrupo($orientador_repositorio, $orientador) {
                if(isset($orientador_repositorio) && !empty($orientador_repositorio)){
                    foreach ($orientador_repositorio as $o) {

                        if ($o === $orientador) {
                            return TRUE;
                        }
                    }
                }
                return FALSE;
            };
            
            echo form_label('Orientador *');
              
            $orientador_array = array(''); 
            if(isset($orientadores) && !empty($orientadores)){
                foreach($orientadores as $o){
                    $orientador_array[$o->ori_id] = $o->ori_nome;
                }
            }
            
            echo form_dropdown('orientadores_ori_id', $orientador_array, (isset($repositorio->orientadores_ori_id)? $repositorio->orientadores_ori_id: set_value('orientadores')),'class="form-control"');
            echo form_error('orientadores_ori_id');
            ?>
            <label for="orientadores" class="" style="display: none;" id="msg_verifica_orientadores">&nbsp;Selecione ao menos um orientador.</label>
        </div>
    </div>
    
    <div class="row">
            <?php
            if(!isset($repositorio->rep_monografia)){
                echo '<div class="form-group col-lg-6 ">';
                echo form_label('Monografia');
                echo '<input type="file" name="rep_monografia" id="rep_monografia" value="">
                </div>';
                echo '<div class="form-group col-lg-3"></div>';
            }
            else{
               echo '<div class="form-group col-lg-6"></div>';
            }  
            ?> 
    </div>
    
    <div class="row">
            <?php  
            if(!isset($repositorio->rep_video)){
                echo '<div class="form-group col-lg-6 ">';
                echo form_label('Vídeo');
                echo '<input type="file" name="rep_video" id="rep_video" value="" >
                </div> ';
                echo '<div class="form-group col-lg-3"></div>';
            }
            else{
                echo '<div class="form-group col-lg-6"></div>';
            }  
            ?>
    </div>
    
     <div class="row">
           <?php
            if(!isset($repositorio->rep_codigo_fonte)){
                echo '<div class="form-group col-lg-6 ">';
                echo form_label('Código Fonte');
                echo '<input type="file" name="rep_codigo_fonte" id="rep_codigo_fonte" value="" >
                 </div>';
               echo '<div class="form-group col-lg-3"></div>';
            }
            else{
               echo '<div class="form-group col-lg-6"></div>';
            }  
            ?>
    </div>
       
    <div class="row" style="padding-top: 70px">
        <div class="form-group col-lg-9">
            <?php 
            
            echo form_submit('salvar','Salvar', 'class="btn btn-primary"');
            $data = "";          
              
            echo nbs(2) . form_button('cancelar','Cancelar','class="btn btn-danger btn_cancelar"');
            
            ?>
        </div>
    </div>
    
    <?php echo form_close(); ?>
    
</div> 