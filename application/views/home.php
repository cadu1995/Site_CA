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

        echo link_tag(base_url('assets/css/custon.css'), 'stylesheet', 'text/css', 'screen');
        lnbreak();

        echo link_tag(base_url('assets/css/slide/bxslider.css'), 'stylesheet', 'text/css', 'screen');
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
                    <li class="current"><a href="<?php echo base_url('home'); ?>">Início</a></li>
                    <li><a href="<?php echo base_url('home/noticias'); ?>">Notícias</a></li>
                    <li><a href="right-sidebar.html">Eventos</a></li>
                    <li><a href="right-sidebar.html">Repositório</a></li>
                    <li style="float: right"><a href="no-sidebar.html">Login</a></li>
                </ul>
            </nav>

            <!-- Banner -->
            <div id="banner-wrapper">
                <section class="slider">
                    <ul class="bxslider">
                        <?php
                        foreach ($slide as $s):
                            ?>
                            <li>
                                <a href="<?php echo base_url($s->con_link); ?>" target="_blank">
                                <img src="<?php echo base_url($s->con_imagem); ?>" />
                                <p class="flex-caption"><?php echo $s->con_titulo; ?></p>
                                </a>
                            </li>
                            <?php
                        endforeach;
                        ?>

                    </ul>
                </section>
            </div>

            <!-- Main -->
            <div id="main-wrapper">
                <div id="main" class="container">
                    <div class="row 200%">
                        <div class="12u">

                            <!-- Features -->
                            <section class="box features">
                                <h2 class="major"><span>Ultimas Notícias</span></h2>
                                <div>
                                    <div class="row">
                                        <?php
                                        for ($i = 0; $i < 4; $i++):
                                            ?>
                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <a href="#" class="image featured"><img src="<?php echo base_url($noticias[$i]->con_imagem); ?>" alt="" /></a>
                                                    <h3><a href="#"><?php echo $noticias[$i]->con_titulo ?></a></h3>
                                                    <p>
    <?php
                                                        echo $noticias[$i]->con_subtitulo;
    ?>
                                                    </p>
                                                </section>

                                            </div>
    <?php
endfor;
?>

                                        <div class="12u" >
                                            <ul class="actions">
                                                <li><a href="#" class="button alt big">Ver mais</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <section class="box features">
                                <h2 class="major"><span>ULTIMOS EVENTOS</span></h2>
                                <div>
                                    <div class="row">
<?php
for ($i = 0; $i < 4; $i++):
    ?>
                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <a href="#" class="image featured"><img src="<?php echo base_url($eventos[$i]->con_imagem); ?>" alt="" /></a>
                                                    <h3><a href="#"><?php echo $eventos[$i]->con_titulo ?></a></h3>
                                                    <p>
    <?php
//                                                        echo $eventos[$i]->con_descricao
    ?>
                                                    </p>
                                                </section>

                                            </div>
    <?php
endfor;
?>

                                        <div class="12u" >
                                            <ul class="actions">
                                                <li><a href="#" class="button alt big">Ver mais</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer id="footer" class="container">
                <div class="row 200%">
                    <div class="12u">

                        <!-- About -->
                        <section>
                            <h2 class="major"><span>Contato</span></h2>
                            <ul class="contact">
                                <li><a class="icon fa-facebook" href="#"><span class="label">Facebook</span></a></li>
                                <li><a class="icon fa-twitter" href="#"><span class="label">Twitter</span></a></li>
                                <li><a class="icon fa-instagram" href="#"><span class="label">Instagram</span></a></li>
                                <li><a class="icon fa-dribbble" href="#"><span class="label">Dribbble</span></a></li>
                                <li><a class="icon fa-google-plus" href="#"><span class="label">Google+</span></a></li>
                            </ul>
                        </section>

                    </div>
                </div>
                <!-- Copyright -->
                <div id="copyright">
                    <ul class="menu">
                        <li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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

echo script_tag('assets/js/jquery.min.js', 'text/javascript');
lnbreak();

echo script_tag('assets/js/slide/bxslider.js', 'text/javascript');
lnbreak();

echo script_tag('assets/js/slide/slide.js', 'text/javascript');
lnbreak();
?>

    </body>
</html>
