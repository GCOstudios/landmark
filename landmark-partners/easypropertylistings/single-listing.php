<?php
/**
 * The Default Template for displaying all Easy Property Listings single posts with WordPress Themes
 *
 * @package EPL
 * @subpackage Templates/Themes/Default
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
 <div id="primary" class="site-content content-area epl-single-default <?php echo epl_get_active_theme_name(); ?>">
 	
	<section class="content">
			 			<?php if ( is_active_sidebar( 'single-property-banner' ) ) : ?>
		 			<div id="property-banner">
       					 <div class="banner-container">
            <?php dynamic_sidebar( 'single-property-banner' ); ?>
        				</div><!-- .banner-container -->
    				</div><!-- #property-banner -->
					<?php endif; ?>

								<?php 
  								 if(function_exists('get_hansel_and_gretel_breadcrumbs')): 
     							 echo get_hansel_and_gretel_breadcrumbs();
   									endif;
									?>

	<div class="container">
   		<div class="row">
	      	<div class="main col-lg-8 col-md-8" id="ktmain" role="main">
                <article class="entry-content" itemprop="mainContentOfPage">

							<?php
							if ( have_posts() ) : ?>
							<div class="loop">
							<div class="loop-content <?php echo epl_template_class( 'default', 'single' ); ?>">
							<?php
							while ( have_posts() ) : // The Loop
								the_post();
								do_action('epl_property_single');
								// comments_template(); // include comments template
							endwhile; // end of one post
							?>
							</div>
							</div>
							<?php endif; ?>
						</article>
					</div>
						<?php if ( is_active_sidebar( 'single-property' ) ) : ?>
							<aside id="ktsidebar" class="col-lg-4 col-md-4 kad-sidebar" role="complementary">
        				<div class="sidebar">
           				 <?php dynamic_sidebar( 'single-property' ); ?>
           				 <hr>
           				 <div class="data-room" >
			<h4><i class="fa icon-download"></i> Data Room</h4>
			<?php echo do_shortcode('[spu popup="840"]Please click here to access the data room files[/spu]'); ?>
			<?php if(current_user_can('mepr-active','rule: 791')): ?> 
				<h6>Available Files: </h6>
			<?php do_action( 'epl_buttons_single_property' ); ?> 
			<?php endif; ?>
			<h6>Alredy registered? Log in below</h6>
			<?php echo do_shortcode('[mepr-login-form use_redirect="false"]'); ?>

		</div>
        				</div>
					</aside>
					<?php endif; ?>
				</div>
			</div>
		</div>
</section>
		<?php do_action( 'epl_property_map' ); ?>		
</div>

<?php get_footer(); ?>
