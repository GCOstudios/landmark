<?php
/*
Template Name: Sectors Gridder Boxes 
*/
    /**
    * @hooked virtue_page_title - 20
    */
    ?>

                <?php if ( is_active_sidebar( 'sectors-page' ) ) : ?>
                    <div id="property-banner">
                         <div class="banner-container">
            <?php dynamic_sidebar( 'sectors-page' ); ?>
                        </div><!-- .banner-container -->
                    </div><!-- #property-banner -->
                    <?php endif; ?>

                        <?php 
                                 if(function_exists('get_hansel_and_gretel_breadcrumbs')): 
                                 echo get_hansel_and_gretel_breadcrumbs();
                                    endif;
                                    ?>
<section id="sectors-page">

 <div id="content" class="container">
        <div class="row">
      <div class="main" id="ktmain" role="main">
            <?php 
            do_action('kadence_page_before_content'); ?>
            <div class="entry-content" itemprop="mainContentOfPage">
                    <?php get_template_part( 'templates/content', 'page' ); ?>

                            <?php wp_reset_query(); ?>
<div class="container-big">
            <ul class="gridder">
<?php $args = array( 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC');?>
   <?php $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php if ( $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full' ) ) : ?>

            <li class="gridder-list sectors-grid" data-griddercontent="#gridder-content-1">
                <div class="img-fluid hovereffect" style="background-image: url('<?php echo $featured_image[0]; ?>')">
        <div class="overlay">
                <h2><?php the_title(); ?></h2>
                 <!-- <div class="info"><?php echo(get_the_excerpt()); ?></div> -->
                    </div>
                     </div>
                    </li>
<?php endif; ?>

<div id="gridder-content-1" class="gridder-content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="sectors-content">
                        <h3><?php the_title() ?></h3>
                         <?php the_content() ?>
                       </div>
                    </div>
                </div>
            </div>
<?php endwhile; ?>
</ul>
</section><!-- sectors -->



                </div> <!--portfoliowrapper-->
                    <?php               
                    /**
                    * @hooked virtue_page_comments - 20
                    */
                    do_action('kadence_page_footer');
                    do_action('virtue_page_footer');
                    ?>
</div><!-- /.main -->


