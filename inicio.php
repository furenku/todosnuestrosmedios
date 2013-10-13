<?php
/*

Template Name: Inicio

 */

get_header(); ?>

    <div class="large-8 columns" role="main">

      
      <?php
      $inicio = "";
      
      $q = new WP_Query(array('category_name'=>'inicio'));

      if ( $q->have_posts() ) {

        while ( $q->have_posts() ) {
          $q->the_post();

          $titulo = get_the_title();
          $extracto = get_the_content();
          $extracto = wp_trim_words( $extracto, 80 );
          $fecha = get_the_date();
          
          $link = "http://google.com";

          
          $echo = '<div class="titulo"><h3>' . $titulo . '</h3></div>';
          $echo .= '<div class="extracto">' . $extracto . '</div>';
          $echo .= '<div class="ir_al_link"><h6>Ir al link -></h6></div>';
          $echo = '<a href="'.$link.'" target="_blank">' . $echo . '</a>';

          $echo = '<div class="post">' . $echo . '</div>';
          
          $inicio .= $echo;
        }			
      }

      $inicio = '<div id="inicio" class="contenedor_posts">' . $inicio . '</div>';
      echo $inicio;
      ?>
    </div>

    <aside class="large-4 columns sidebar">
      
      <?php

      require('twidget.php');
      require('fb.php');

      ?>


      <?php wp_tag_cloud('smallest=15&largest=40&number=50&orderby=count'); ?>


      
    </aside>

<?php get_footer(); ?>