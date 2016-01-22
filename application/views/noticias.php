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
                    <li class="current"><a href="<?php echo base_url('home/noticias'); ?>">Notícias</a></li>
                    <li><a href="right-sidebar.html">Eventos</a></li>
                    <li><a href="right-sidebar.html">Repositório</a></li>
                    <li style="float: right"><a href="no-sidebar.html">Login</a></li>
                </ul>
            </nav>

            <!-- Main -->
            <div id="main-wrapper">
                <div id="main" class="container">
                    <div class="row">
                        <div class="3u 12u(mobile)">
                            <div class="sidebar">

                                <!-- Sidebar -->

                                <!-- Recent Posts -->
                                <section>
                                    <h2 class="major"><span>Recent Posts</span></h2>
                                    <ul class="divided">
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">A Subheading</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock-o">6 hours ago</li>
                                                    <li class="icon fa-comments"><a href="#">34</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">Another Subheading</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock-o">9 hours ago</li>
                                                    <li class="icon fa-comments"><a href="#">27</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="#">And Another</a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock-o">Yesterday</li>
                                                    <li class="icon fa-comments"><a href="#">184</a></li>
                                                </ul>
                                            </article>
                                        </li>
                                    </ul>
                                    <a href="#" class="button alt">Browse Archives</a>
                                </section>

                                <!-- Something -->
                                <section>
                                    <h2 class="major"><span>Ipsum Dolore</span></h2>
                                    <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                                    <p>
                                        Donec sagittis massa et leo semper scele risque metus faucibus. Morbi congue mattis mi.
                                        Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum sed commodo luctus blandit.
                                    </p>
                                    <a href="#" class="button alt">Learn more</a>
                                </section>

                                <!-- Something -->
                                <section>
                                    <h2 class="major"><span>Magna Feugiat</span></h2>
                                    <p>
                                        Rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien.
                                        Donec sagittis massa et leo semper scele risque metus faucibus. Morbi congue mattis mi.
                                        Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum sed commodo luctus blandit.
                                    </p>
                                    <a href="#" class="button alt">Learn more</a>
                                </section>

                            </div>
                        </div>
                        <div class="9u 12u(mobile) important(mobile)">
                            <div class="content content-right">

                                <!-- Content -->

                                <article class="box page-content">

                                    <header>
                                        <h2>Noticias</h2>
                                    </header>

                                    <div class="row">


                                        <?php
                                        
                                        foreach ($noticias as $n):
                                            
                                            
                                            
                                            ?>


                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <a href="#" class="image featured"><img src="<?php echo base_url($n->con_imagem);  ?>" alt="" /></a>
                                                    <h3><a href="#"><?php echo $n->con_titulo;  ?></a></h3>
                                                    <p>
                                                        <?php echo $n->con_subtitulo;  ?>
                                                    </p>
                                                </section>

                                            </div>
                                            <?php
                                        endforeach;
                                        ?>

                                    </div>


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
?>

    </body>
</html>