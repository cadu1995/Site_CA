<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

echo doctype('html5');
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
        echo link_tag(base_url('assets/css/bootstrap.min.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        echo link_tag(base_url('assets/css/font-awesome.min.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        echo link_tag(base_url('assets/css/jquery-ui.min.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        echo link_tag(base_url('assets/css/sb-admin-2.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
        
        if(isset($css) && is_array($css)){
           
            foreach ($css as $c){
                
                echo link_tag(base_url('assets/css/'.$c.'.css'), 'stylesheet', 'text/css', 'screen');lnbreak();
            }
        }
       
        ?>
        
        <title>Centro Academico Alan Turing</title>
    </head>
    
    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">CA Alan Turing</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <?php 
                        $user = $this->session->userdata('nome');
                        $user = explode(' ', $user);
                        $user = $user[0];
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo nbs(1) . $user;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url('adm/minha_conta'); ?>"><i class="fa fa-fw fa-user"></i> Minha conta</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('adm/logout');?>">
                            <i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <?php 
                            echo '<a href="' . base_url("adm/dashboard") .'"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>';
                            ?>
                        </li>
                        
                        <?php 

                        $new_funcionalidade = $this->session->userdata('funcionalidade');

                        if(isset($new_funcionalidade[0])){
                            for($i = 0; $i < sizeof($new_funcionalidade); $i++){
                                echo ' <li>';
                                echo '<a href="' . base_url("adm/" . $new_funcionalidade[$i]->url) . '"><i class="' . $new_funcionalidade[$i]->icone . '"></i> ' . $new_funcionalidade[$i]->nome. '</a>';
                                echo ' </li>';

                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                    ?>
                    </ul>                  
                    
                    
                    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                            <?php $this->load->view("adm/" . (isset($view)) ? $view : ''); ?>
                </div>
             </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    
    <?php 
        
        echo script_tag('assets/js/jquery.min.js', 'text/javascript');lnbreak();
        
        echo script_tag('assets/js/bootstrap.min.js', 'text/javascript');lnbreak();
        
        echo script_tag('assets/js/metisMenu.min.js', 'text/javascript');lnbreak();
        
        echo script_tag('assets/js/sb-admin-2.js', 'text/javascript');lnbreak();
        

        // Carrega os javascripts exclusivos de cada pagina que sao definidos nas controladoras
        if(isset($js) && is_array($js)){
           
            foreach ($js as $j){
                
                echo script_tag('assets/js/' . $j . '.js', 'text/javascript');lnbreak();
            }
        }
        
    ?>

</body>

</html>