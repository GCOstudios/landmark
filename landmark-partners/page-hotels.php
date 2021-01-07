<?php
/*
Template Name: Custom Hotels
*/
/**
* @hooked virtue_page_title - 20
*/
  // do_action('kadence_page_title_container');
?>

<div id="property-banner">
  <div class="banner-container">
    <?php the_post_thumbnail(); ?>
  </div><!-- .banner-container -->
</div><!-- #property-banner -->

<?php 
  if(function_exists('get_hansel_and_gretel_breadcrumbs')): 
    echo get_hansel_and_gretel_breadcrumbs();
  endif;
?>
	
  <div id="content" class="container">
    <div class="row">
      <div class="main col-md-12 <?php // echo virtue_main_class(); ?>" id="ktmain" role="main">
        <?php do_action('kadence_page_before_content'); ?>

        <div class="entry-content" itemprop="mainContentOfPage">
          <?php get_template_part('templates/content', 'page-hotel'); ?>
        </div>

        <?php 
        /**
        * @hooked virtue_page_comments - 20
        */
        do_action('kadence_page_footer');
        ?>
      </div><!-- /.main -->