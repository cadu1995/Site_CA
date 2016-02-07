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
                                        <h2><?php echo $repositorio->rep_nome;  ?></h2>
                                    </header>
                                    <p>
                                        <strong>Resumo:</strong><br>
                                        <?php echo $repositorio->rep_descricao;  ?>
                                    </p>
                                    <p>
                                        <strong>Autor:</strong> 
                                    <?php echo $repositorio->rep_autor; ?>
                                        <br>
                                        <strong>Email:</strong>
                                    <?php echo $repositorio->rep_autor_email; ?>
                                    </p>
                                    <p>
                                        <strong>Orientador:</strong> 
                                    <?php echo $repositorio->ori_nome; ?>
                                        <br>
                                        <strong>Email:</strong>
                                    <?php echo $repositorio->ori_email; ?>
                                    </p>

                                    <p>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url($repositorio->rep_monografia); ?>" target="_blank">&raquo; Monografia</a><br>
                                            </li>
                                            <?php
                                            $id = $this->session->userdata('usuario_id');

                                            if ($id > 0 && isset($repositorio->rep_video)):
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url($repositorio->rep_video); ?>" target="_blank">&raquo; Vídeo</a><br>
                                                </li>
                                                <?php
                                            endif;
                                            if ($id > 0 && isset($repositorio->rep_codigo_fonte)):
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url($repositorio->rep_codigo_fonte); ?>" target="_blank">&raquo; Código Fonte</a><br>
                                                </li>
                                                <?php
                                            endif;
                                            ?>
                                        </ul>
                                    </p>
                                </article>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $this->load->view('front/footer');
            ?>