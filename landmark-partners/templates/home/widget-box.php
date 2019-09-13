<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="home-margin home-padding kad-animation" data-animation="fade-in" data-delay="0">
    <div class="home-widget-box">
        <?php  if(is_active_sidebar('homewidget')) { dynamic_sidebar('homewidget'); } ?>
    </div> <!--home widget box -->
</div>
<section class="info-boxes">

		<?php $folio_loop = new WP_Query( array( 'post_type' => 'page', 'orderby' => 'menu_order', 'category_name' => 'home-info-box', 'posts_per_page' => '3') ); ?>

<div class="flex-row">

		<?php while ( $folio_loop->have_posts() ) : $folio_loop->the_post(); ?>
      <?php if ( $featured_image = wp_get_attachment_image_src( 
           get_post_thumbnail_id( $post->ID ), 'medium' ) ) : ?>
			<div class="Box1 col-sm-4ths col-xs-12">
				<div class="hovereffect" style="background-image: url('<?php echo $featured_image[0]; ?>')">
       				 <div class="overlay">
          			 <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          			 <!-- <div class="info"><?php echo(get_the_excerpt()); ?></div> -->
        			</div>
   				 </div>
   			</div>	
        <?php endif; ?>
		<?php endwhile; ?>	
 		<?php wp_reset_query(); ?>

 		<div class="twitter-box icon-box-01 bg1 col-sm-4ths col-xs-12 dark-blue">
      <h4 class="twitter-title">Tweets from @TheLandmarkPtrs</h4>
<?php echo do_shortcode('[custom-twitter-feeds]'); ?>
</div>
</section>
