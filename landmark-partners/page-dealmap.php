<?php
/*
Template Name: Deal Map Template
*/
    /**
    * @hooked virtue_page_title - 20
    */
    ?>

                <?php if ( is_active_sidebar( 'dealmap' ) ) : ?>
                    <div id="map-banner">
                         <div class="banner-container">
            <?php dynamic_sidebar( 'dealmap' ); ?>
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
     		<div class="main" id="ktmain" role="main">
                
				<div class="entry-content" itemprop="mainContentOfPage">
					<?php get_template_part('templates/content', 'page'); ?>
				</div>
				<?php 
                /**
                * @hooked virtue_page_comments - 20
                */
                do_action('kadence_page_footer');
                ?>
	</div><!-- /.main -->