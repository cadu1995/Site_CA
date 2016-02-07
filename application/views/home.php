<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
echo doctype('html5');
$this->load->view('front/top');
?>
            <!-- Slides -->
            <div id="banner-wrapper">
                <section class="slider">
                    <ul class="bxslider">
                        <?php
                        foreach ($slide as $s):
                            ?>
                            <li>
                                <a href="<?php echo base_url(((1 == $s->tipo_conteudo_tp_con_id) ? 'noticias/ver/' : 'eventos/ver/').$s->con_link); ?>" target="_blank">
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
                                        
                                        if(sizeof($noticias) > 4){
                                            $count = 4;
                                        }else{
                                            $count = sizeof($noticias);
                                        }
                                        
                                        for ($i = 0; $i < $count; $i++):
                                            ?>
                                            <div class="3u 12u(mobile)">

                                                <!-- Slide -->
                                                <section class="box feature">
                                                    <a href="<?php echo base_url('noticias/ver/'.$noticias[$i]->con_link)?>" class="image featured"><img src="<?php echo base_url($noticias[$i]->con_imagem); ?>" alt="" /></a>
                                                    <h3><a href="<?php echo base_url('noticias/ver/'.$noticias[$i]->con_link)?>"><?php echo $noticias[$i]->con_titulo ?></a></h3>
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
                                                <li><a href="<?php echo base_url('noticias'); ?>" class="button alt big">Ver mais</a></li>
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
                                        
                                        if(sizeof($eventos) > 4){
                                            $count = 4;
                                        }else{
                                            $count = sizeof($eventos);
                                        }
                                        
                                        for ($i = 0; $i < $count; $i++):
                                            ?>
                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <a href="<?php echo base_url('eventos/ver/'.$eventos[$i]->con_link) ?>" class="image featured"><img src="<?php echo base_url($eventos[$i]->con_imagem); ?>" alt="" /></a>
                                                    <h3><a href="<?php echo base_url('eventos/ver/'.$eventos[$i]->con_link) ?>"><?php echo $eventos[$i]->con_titulo ?></a></h3>
                                                    <p>
                                                    <?php
                                                        echo $eventos[$i]->con_subtitulo;
                                                    ?>
                                                    </p>
                                                </section>

                                            </div>
                                            <?php
                                        endfor;
                                        ?>

                                        <div class="12u" >
                                            <ul class="actions">
                                                <li><a href="<?php echo base_url('eventos'); ?>" class="button alt big">Ver mais</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>          
<?php
$this->load->view('front/footer');
?>