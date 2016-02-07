

<div class="col-lg-12">
    <h1 class="page-header">
       Dashboard
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('adm/dashboard'); ?>">Dashboard</a>
        </li>
    </ol>
    <?php 
    if($this->session->userdata('grupos') == 1) {
        echo '<div class="panel panel-default">';
        echo '<div class="panel-heading">Acessos</div>';
        echo '<div class="panel-body">';
        echo '<div id="plot" style="width:100%;height:400px"></div>';
        echo '</div></div>';
    } else {
        echo br(30);
    }
    ?>
</div>