<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
echo doctype('html5');
$this->load->view('front/top');
?>

            <!-- Main -->
            <div id="main-wrapper">
                <div id="main" class="container">
                    <div class="row">
                        <?php 
                        $this->load->view('front/sidebar');
                        ?>
                        <div class="9u 12u(mobile) important(mobile)">
                            <div class="content content-right">

                                <!-- Content -->

                                <article class="box page-content">

                                    <header>
                                        <h2><?php echo $titulo;  ?></h2>
                                        <?php 
                                        if($titulo == 'Pesquisa' && isset($keyword)){
                                            echo '<p>Resultados para "'.$keyword.'".</p>';
                                        }elseif($titulo == 'Pesquisa' && isset($nome_area)){
                                            echo '<p>Eventos em "'.$nome_area->are_nome.'".</p>';
                                        }
                                        ?>
                                    </header>

                                    <div class="row">
                                        <?php
                                        
                                        if(!empty($eventos)):
                                        
                                            foreach ($eventos as $n):
                                            ?>
                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <a href="<?php echo base_url('eventos/ver/'.$n->con_link)?>" class="image featured"><img src="<?php echo base_url($n->con_imagem);  ?>" alt="" /></a>
                                                    <h3><a href="<?php echo base_url('eventos/ver/'.$n->con_link)?>"><?php echo $n->con_titulo;  ?></a></h3>
                                                    <p>
                                                        <?php echo word_limiter($n->con_subtitulo, 10);  ?>
                                                    </p>
                                                </section>

                                            </div>
                                            <?php
                                            endforeach;
                                        else:
                                            echo '<p>Não há eventos para exibir.</p>';
                                        endif;
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