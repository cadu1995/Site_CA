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
                                            echo '<p>TCC\'s em "'.$nome_area->are_nome.'".</p>';
                                        }
                                        ?>
                                    </header>

                                    <div class="row">


                                        <?php
                                        
                                        if(isset($repositorios) && !empty($repositorios)):
                                        
                                            foreach ($repositorios as $n):
                                            ?>


                                            <div class="3u 12u(mobile)">

                                                <!-- Feature -->
                                                <section class="box feature">
                                                    <h3><a href="<?php echo base_url('repositorios/ver/'.$n->rep_link.'/')?>"><?php echo $n->rep_nome;  ?></a></h3>
                                                    <p>
                                                        <?php echo $n->rep_descricao;  ?>
                                                    </p>
                                                </section>

                                            </div>
                                            <?php
                                            endforeach;
                                        else:
                                            echo '<p>Não há resultados para exibir.</p>';
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