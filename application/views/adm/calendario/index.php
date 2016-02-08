<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-lg-12">
    <h1 class="page-header">
       Calendário
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-calendar"></i>  <a href="<?php echo base_url('adm/calendario');?>">Calendário</a>
        </li>
        <li class="active">
            <i class="fa fa-google"></i> <?php echo $titulo = 'Google Agenda - Centro Acadêmico Alan Turing';?>
        </li>
    </ol>
    
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Google Calendar
        </div> 
        <div class="panel-body">
            <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=cacompifmuz%40gmail.com&amp;color=%232952A3&amp;src=b2i32leb66t340t1cmg344oc88%40group.calendar.google.com&amp;color=%232952A3&amp;src=pt.brazilian%23holiday%40group.v.calendar.google.com&amp;color=%23060D5E&amp;ctz=America%2FSao_Paulo" style="border: 0;width:100%;min-height:600px;" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
</div>