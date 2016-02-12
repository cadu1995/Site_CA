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
                                        }elseif($titulo == 'Áreas' && isset($nome_area)){
                                            echo '<p>Notícias em "'.$nome_area->are_nome.'".</p>';
                                        }
                                        ?>
                                    </header>

                                    <div class="row">


                                        <?php
                                        
                                        if(!empty($noticias)):
                                            $cont = 0;
                                            foreach ($noticias as $n):
                                                if($cont % 4 == 0){
                                                    echo '<div class="row">';
                                                }
                                            ?>


                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <a href="<?php echo base_url('noticias/ver/'.$n->con_link)?>" class="image featured"><img src="<?php echo base_url($n->con_imagem);  ?>" alt="" /></a>
                                                    <h3><a href="<?php echo base_url('noticias/ver/'.$n->con_link)?>"><?php echo $n->con_titulo;  ?></a></h3>
                                                    <p>
                                                        <?php echo word_limiter($n->con_subtitulo, 10);  ?>
                                                    </p>
                                                </section>

                                            </div>
                                            <?php
                                                if($cont % 4 == 3){
                                                    echo '</div>';
                                                }
                                                $cont++;
                                            endforeach;
                                        else:
                                            echo '<p>Não há notícias para exibir.</p>';
                                        endif;
                                        ?>

                                    </div>


                                </article>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $this->load->view('front/footer');
            ?>