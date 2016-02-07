<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

echo doctype('html5');
?>

<html>
    <head>
        <?php
        
        $meta = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => 'Centro Acadêmico Alan Turing'),
            array('name' => 'keyword', 'content' => 'ca, Centro academico,alan turing, ifsuldeminas, muzambinho'),
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')
        );
        
        //Gera as tags HTML
        echo meta($meta);
        
        //Carrega os estilos usados na pagina
        echo link_tag(base_url('assets/css/bootstrap.min.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        echo link_tag(base_url('assets/css/font-awesome.min.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        echo link_tag(base_url('assets/css/sb-admin-2'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        $title = 'Centro Acadêmico Alan Turing';
        ?>
        
        <title><?php echo $title;?></title>
    </head>
    
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            
                           <?php echo form_open('adm/login/autenticar');?>
                                <fieldset>
                                    <div class="form-group">
                                        <?php
                                        
                                            $email = array(
                                                'name'          => 'matricula',
                                                'value'         => set_value('matricula'),
                                                'placeholder'   => 'Matricula',
                                                'type'          => 'text',
                                                'class'         => 'form-control',
                                                'autofocus'     => ''
                                            );
                                            
                                            echo form_input($email);
                                            echo form_error('email');
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        
                                            $senha = array(
                                                'name'          => 'senha',
                                                'placeholder'   => 'Senha',
                                                'type'          => 'password',
                                                'class'         => 'form-control'
                                            );
                                            
                                            echo form_input($senha);
                                            echo form_error('senha');
                                            
                                            if(isset($msg)){
                                                echo '<br>';
                                                echo form_label($msg,'msg',array('class' => 'error'));
                                            }
                                        ?>
                                    </div>
                                    
                                    <?php
                                    $redirect = 'class="btn btn-lg btn-danger" style="width:49% !important;" onclick="location.href=\''.base_url('').'\'"';
                                    echo form_submit('entrar', 'Entrar', 'class="btn btn-lg btn-success" style="width:49%;"');
                                    echo nbs(1) . form_button('cancelar','Cancelar', $redirect);
                                    ?>
                                    
                                </fieldset>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
        
        echo script_tag('assets/js/jquery.js', 'text/javascript');lnbreak();
        
        echo script_tag('assets/js/bootstrap.min.js', 'text/javascript');lnbreak();
        
        
        ?>
        
    </body>
</html>