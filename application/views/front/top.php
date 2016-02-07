<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<html>
    <head>
        <?php
        $meta = array(
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'description', 'content' => 'Centro Academico'),
            array('name' => 'keyword', 'content' => 'ca, Centro academico,alan turing, ifsuldeminas, muzambinho'),
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=UTF-8', 'type' => 'equiv'),
            array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')
        );

        //Gera as tags HTML
        echo meta($meta);
        echo '<link rel="icon" href="'.base_url('ca.gif').'" type="image/gif">';

        //Carrega os estilos usados na pagina
        echo link_tag(base_url('assets/css/main.css'), 'stylesheet', 'text/css', 'screen');
        lnbreak();
        
        if(isset($css) && is_array($css)){
           
            foreach ($css as $c){
                
                echo link_tag(base_url('assets/css/'.$c.'.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
            }
        }
        ?>
    </head>
    <title>Centro Acadêmico Alan Turing</title>
    <body class="homepage">
        <div id="page-wrapper">
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li style="float: left">&nbsp;&nbsp;<img src="<?php echo base_url('img/ws/ca.png'); ?>" style="width: 50px;"></li>
                    <li <?php if($page == 'home'){ echo 'class="current"';}?>><a href="<?php echo base_url('home'); ?>">Início</a></li>
                    <li <?php if($page == 'noticias'){ echo 'class="current"';}?>><a href="<?php echo base_url('noticias'); ?>">Notícias</a></li>
                    <li <?php if($page == 'eventos'){ echo 'class="current"';}?>><a href="<?php echo base_url('eventos')?>">Eventos</a></li>
                    <li <?php if($page == 'repositorios'){ echo 'class="current"';}?>><a href="<?php echo base_url('repositorios')?>">Repositório</a></li>
                    <li <?php if($page == 'historia'){ echo 'class="current"';}?>><a href="<?php echo base_url('historia')?>">História</a></li>
                    <?php
                    $id = $this->session->userdata('usuario_id');
                    
                    if($id > 0):
                        ?>
                        <li style="float: right"><a href="<?php echo base_url('adm/dashboard')?>">Acessar</a></li>
                    <?php
                        else:
                    ?>
                    <li style="float: right"><a href="<?php echo base_url('adm/login')?>">Login</a></li>
                    <?php
                        endif;
                    ?>
                </ul>
            </nav>