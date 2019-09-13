<?php
/*
Template Name: Sectors Alternating Layout
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

<div class="container-big-flex flex-row">
<?php $args = array( 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC');?>
   <?php $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="row main alternating">
    <div class="col-md-4 flex-column">
        <div class="fixed-image">
            <div class="img-fluid hovereffect" id="sectors-loop"><?php the_post_thumbnail(); ?>
                <div class="overlay">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                 <!-- <div class="info"><?php echo(get_the_excerpt()); ?></div> -->
                </div>
             </div>
         </div>
     </div>
                    <div class="col-md-8 flex-column">
                      <div class="sectors-content">
                        <h3><?php the_title() ?></h3>
                         <?php the_content() ?>
                       </div>
                    </div>
            </div>

<?php endwhile; ?>
</div>
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