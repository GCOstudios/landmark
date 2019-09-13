<?php
/*
Template Name: Landmark Staff Grid
*/
global $post, $virtue_premium, $kt_staff_loop; 
    /**
    * @hooked virtue_page_title - 20
    */

    ?>

                <?php if ( is_active_sidebar( 'about-page' ) ) : ?>
                    <div id="property-banner">
                         <div class="banner-container">
            <?php dynamic_sidebar( 'about-page' ); ?>
                        </div><!-- .banner-container -->
                    </div><!-- #property-banner -->
                    <?php endif; ?>

                        <?php 
                                 if(function_exists('get_hansel_and_gretel_breadcrumbs')): 
                                 echo get_hansel_and_gretel_breadcrumbs();
                                    endif;
                                    ?>

    <div id="content" class="container">
   		<div class="row">
      <div class="main <?php echo esc_attr( virtue_main_class() ); ?>" id="ktmain" role="main">
      		<?php 
			do_action('kadence_page_before_content'); ?>
			<div class="entry-content" itemprop="mainContentOfPage">
					<?php get_template_part( 'templates/content', 'page' ); ?>
 <section id="staff">

<div class="container-big">
            <ul class="gridder">
<?php $args = array( 'post_type' => 'staff', 'orderby' => 'menu_order', 'order' => 'ASC');
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
       <li class="gridder-list" data-griddercontent="#gridder-content-1">
       	<div class="img-fluid hovereffect" id="loop"><?php the_post_thumbnail(); ?>
       	<div class="overlay">
                <h2><?php the_title(); ?></h2>
                 <!-- <div class="info"><?php echo(get_the_excerpt()); ?></div> -->
          			</div>
          			 </div>
        			</li>


            <div id="gridder-content-1" class="gridder-content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="staff-content">
                        <h3><?php the_title() ?></h3>
                         <?php the_content() ?>
                       </div>
                    </div>
                </div>
            </div>
<?php endwhile; ?>
</ul>
</div>
</section><!-- staff -->



                </div> <!--portfoliowrapper-->
                    <?php               
	                /**
	                * @hooked virtue_page_comments - 20
	                */
	                do_action('kadence_page_footer');
	                do_action('virtue_page_footer');
	                ?>
</div><!-- /.main -->
