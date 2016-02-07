                        <div class="3u 12u(mobile)">
                            <div class="sidebar">
                                
                                <section>
                                    <?php 
                                    echo form_open(base_url($page.'/pesquisa'));
                                    echo form_input('search', '', 'id="search"');
                                    echo form_submit('btn_search','Pesquisar', 'class="button alt"');
                                    echo form_close();
                                    ?>
                                </section>

                                <?php
                                if($page != 'repositorios'):
                                ?>
                                <!-- Destaques -->
                                <section>
                                    <h2 class="major"><span>Destaques</span></h2>
                                    <ul class="divided">
                                        <?php
                                        if(isset($destaques) && !empty($destaques)):
                                            foreach ($destaques as $d):
                                        ?>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="<?php echo base_url($page.'/ver/'.$d->con_link)?>"><?php echo $d->con_titulo;  ?></a></h3>
                                                <ul class="meta">
                                                    <li class="icon fa-clock-o"><?php list($y, $m, $d) = explode('-', $d->con_data); echo $d.'/'.$m.'/'.$y;  ?></li>
                                                </ul>
                                            </article>
                                        </li>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                </section>
                                <?php
                                endif;
                                ?>
                                <!-- Áreas -->
                                <section>
                                    <h2 class="major"><span>Áreas</span></h2>
                                    <ul>
                                        <?php
                                        if(isset($areas) && !empty($areas)):
                                            foreach ($areas as $a):
                                        ?>
                                        <li>
                                            <article class="box post-summary">
                                                <h3><a href="<?php echo base_url($page.'/pesquisa/'.$a->are_numero)?>"><?php echo $a->are_nome;  ?></a></h3>
                                            </article>
                                        </li>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                </section>

                            </div>
                        </div>