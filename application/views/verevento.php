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
                                        <h2><?php echo $evento->con_titulo;  ?></h2>
                                        <p><?php echo $evento->con_subtitulo;  ?></p>
                                        <ul class="meta">
                                            <li class="icon fa-clock-o"><?php list($y, $m, $d) = explode('-', $evento->con_data); echo $d.'/'.$m.'/'.$y;  ?></li>
                                            <li class="icon fa-user"><?php echo $usuario->usu_nome;  ?></li>
                                        </ul>
                                    </header>

                                    <section>
                                        <span class="image featured"><img src="<?php echo base_url($evento->con_imagem);  ?>" alt="" /></span>
                                    </section>

                                    <section>
                                        <?php echo $evento->con_descricao;  ?>
                                    </section>

                                </article>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php
            $this->load->view('front/footer');
            ?>