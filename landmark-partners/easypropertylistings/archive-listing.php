<?php
/**
 * The Default Template for displaying all Easy Property Listings archive/loop posts with WordPress Themes
 *
 * @package EPL
 * @subpackage Templates/Themes/Default
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

<section id="primary" class="site-content content epl-archive-default <?php echo epl_get_active_theme_name(); ?>">
<?php if ( is_active_sidebar( 'property-banner' ) ) : ?>
		 <div id="property-banner">
        <div class="banner-container">
            <?php dynamic_sidebar( 'property-banner' ); ?>
        </div><!-- .widget-area -->
    </div><!-- #secondary -->
<?php endif; ?>
	<div id="content" role="main">

		<?php
		if ( have_posts() ) : ?>
			<div class="loop pad">
				<header class="archive-header entry-header loop-header">
					<h4 class="archive-title loop-title">
						<?php do_action( 'epl_the_archive_title' ); ?>
					</h4>
			<?php 
   if(function_exists('get_hansel_and_gretel_breadcrumbs')): 
      echo get_hansel_and_gretel_breadcrumbs();
   endif;
?>
				</header>

				<div class="entry-content loop-content <?php echo epl_template_class( 'default', 'archive' ); ?>">
					<?php do_action( 'epl_property_loop_start2' ); ?>
					<?php while ( have_posts() ) : // The Loop
							the_post();
							do_action('epl_property_blog');
						endwhile; // end of one post
					?>
					<?php do_action( 'epl_property_loop_end' ); ?>
				</div>

				<div class="loop-footer">
					<!-- Previous/Next page navigation -->
					<div class="loop-utility clearfix">
						<?php do_action('epl_pagination'); ?>
					</div>
				</div>
			</div>
		<?php
		else :
			?><div class="hentry">
				<?php do_action( 'epl_property_search_not_found' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
</section>
<?php

get_footer();
