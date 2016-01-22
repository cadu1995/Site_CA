<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta content="charset=utf-8">
	<title>FlexSlider 2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- Syntax Highlighter -->
  <?php 
        
        echo link_tag(base_url('assets/css/slide/flexslider.css'), 'stylesheet', 'text/css', 'screen');
        lnbreak();
        
    ?>



</head>
<body class="loading">

  <div id="container" class="cf">

	<div id="main" role="main">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
                <img src="<?php echo base_url('img/Conteudo/kitchen_adventurer_cheesecake_brownie.jpg')?>" />
              <p class="flex-caption">Adventurer Cheesecake Brownie</p>
  	    		</li>
  	    		<li>
  	    	    <img src="<?php echo base_url('img/Conteudo/kitchen_adventurer_lemon.jpg')?>" />
              <p class="flex-caption">Adventurer Lemon</p>
  	    		</li>
  	    		<li>
                    <img src="<?php echo base_url('img/Conteudo/kitchen_adventurer_donut.jpg')?>" />
              <p class="flex-caption">Adventurer Donut</p>
  	    		</li>
  	    		<li>
                    <img src="<?php echo base_url('img/Conteudo/kitchen_adventurer_caramel.jpg')?>" /  	    	    
              <p class="flex-caption">Adventurer Caramel</p>
  	    		</li>
          </ul>
        </div>
      </section>
      <aside>
        

      </aside>
    </div>

  </div>

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>


  
  <?php
        echo script_tag('assets/js/jquery.min.js', 'text/javascript');
        lnbreak();
  
        echo script_tag('assets/js/slide/jquery.easing.js', 'text/javascript');
        lnbreak();
        
        echo script_tag('assets/js/slide/jquery.mousewheel.js', 'text/javascript');
        lnbreak();
        
        echo script_tag('assets/js/slide/jquery.flexslider.js', 'text/javascript');
        lnbreak();
        
        echo script_tag('assets/js/slide/slide.js', 'text/javascript');
        lnbreak();
        
    ?>

</body>
</html>