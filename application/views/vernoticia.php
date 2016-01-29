<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

        //Carrega os estilos usados na pagina
        echo link_tag(base_url('assets/css/main.css'), 'stylesheet', 'text/css', 'screen');
        lnbreak();
        ?>
    </head>
    <title>Centro Acadêmico Alan Turing</title>
    <body class="homepage">
        <div id="page-wrapper">
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li style="float: left"><a>CA</a></li>
                    <li><a href="<?php echo base_url('home/index'); ?>">Início</a></li>
                    <li class="current"><a href="<?php echo base_url('noticias'); ?>">Notícias</a></li>
                    <li><a href="<?php echo base_url('eventos'); ?>">Eventos</a></li>
                    <li><a href="<?php echo base_url('repositorios'); ?>">Repositório</a></li>
                    <li style="float: right"><a href="<?php echo base_url('adm/login'); ?>">Login</a></li>
                </ul>
            </nav>

            <!-- Main -->
            <div id="main-wrapper">
                <div id="main" class="container">
                    <div class="row">
                        <div class="3u 12u(mobile)">
                            <div class="sidebar">

                                <!-- Sidebar -->
                                 <section>
                                    <?php 
                                    echo form_open(base_url('noticias/pesquisa'));
                                    echo form_input('not_search', '', 'id="not_search"');
                                    echo form_submit('search','Pesquisar', 'class="button alt"');
                                    echo form_close();
                                    ?>
                                </section>
                                
                                <!-- Destaques -->
                                <section>
                                    <h2 class="major"><span>Destaques</span></h2>
                                    <ul class="divided">
                                        <?php
                                        foreach ($destaques as $d):
                                        ?>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="<?php echo base_url('noticias/ver/'.$d->con_link)?>"><?php echo $d->con_titulo;  ?></a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock-o"><?php echo $d->con_data;  ?></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                </section>

                            </div>
                        </div>
                        <div class="9u 12u(mobile) important(mobile)">
                            <div class="content content-right">

                                <!-- Content -->

                                <article class="box page-content">

                                    <header>
                                        <h2><?php echo $noticia->con_titulo;  ?></h2>
                                        <p><?php echo $noticia->con_subtitulo;  ?></p>
                                        <ul class="meta">
                                            <li class="icon fa-clock-o"><?php echo $noticia->con_data;  ?></li>
                                            <li class="icon fa-user"><?php echo $usuario->usu_nome;  ?></li>
                                        </ul>
                                    </header>

                                    <section>
                                        <span class="image featured"><img src="<?php echo base_url($noticia->con_imagem);  ?>" alt="" /></span>
                                    </section>

                                    <section>
                                        <?php echo $noticia->con_descricao;  ?>
                                    </section>

                                </article>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <!-- Footer -->
            <footer id="footer" class="container">
                <div class="row 200%">
                    <div class="12u">

                        <!-- About -->
                        <section>
                            <h2 class="major"><span>Contato</span></h2>
                            <ul class="contact">
                                <li><a class="icon fa-facebook" href="https://www.facebook.com/ca.comp.muz"  target="_blank"><span class="label">Facebook</span></a></li>
<!--                                <li><a class="icon fa-twitter" href="#"  target="_blank"><span class="label">Twitter</span></a></li>
                                <li><a class="icon fa-instagram" href="#"  target="_blank"><span class="label">Instagram</span></a></li>
                                <li><a class="icon fa-dribbble" href="#"  target="_blank"><span class="label">Dribbble</span></a></li>-->
                                <li><a class="icon fa-google-plus" href="https://plus.google.com/u/0/112967438506633495744" target="_blank"><span class="label">Google+</span></a></li>
                            </ul>
                        </section>

                    </div>
                </div>
                <!-- Copyright -->
                <div id="copyright">
                    <ul class="menu">
                        <li>&copy; Centro Acadêmico <a href="<?php echo base_url(); ?>">Alan Turing</a>.</li>
                    </ul>
                </div>

            </footer>

        </div>

        <?php
        echo script_tag('assets/js/jquery.min.js', 'text/javascript');
        lnbreak();
        echo script_tag('assets/js/jquery.dropotron.min.js', 'text/javascript');
        lnbreak();
        echo script_tag('assets/js/skel.min.js', 'text/javascript');
        lnbreak();
        echo script_tag('assets/js/skel-viewport.min.js', 'text/javascript');
        lnbreak();
        echo script_tag('assets/js/util.js', 'text/javascript');
        lnbreak();
        echo script_tag('assets/js/main.js', 'text/javascript');
        lnbreak();
        ?>

    </body>
</html>