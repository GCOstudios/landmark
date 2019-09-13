<?php 
global $post, $kt_testimonial_loop;
	if ( $kt_testimonial_loop[ 'columns' ] == '2' ) {
		$itemsize 	= 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12';
	} else if ( $kt_testimonial_loop[ 'columns' ] == '1' ){
		$itemsize = 'tcol-md-12 tcol-sm-12 tcol-xs-12 tcol-ss-12';
	} else if ( $kt_testimonial_loop[ 'columns' ] == '3' ){
		$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12';
	} else if ( $kt_testimonial_loop[ 'columns' ] == '6' ){
		$itemsize = 'tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6';
	} else if ( $kt_testimonial_loop[ 'columns' ] == '5' ){
		$itemsize = 'tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6';
	} else {
		$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
	}
	$image_width = apply_filters( 'kt_testimonial_grid_image_width', 60 );
    $image_height = apply_filters( 'kt_testimonial_grid_image_height', 60 );

?>
<div class="<?php echo esc_attr( $itemsize );?> t_item">
	<div class="grid_item testimonial_item kt_item_fade_in kad_testimonial_fade_in postclass">
		<div class="testimonialbox clearfix">
			<?php if ( has_post_thumbnail( $post->ID ) ) {
				$img = virtue_get_image_array( $image_width , $image_height, true, null, null, get_post_thumbnail_id() );?>
				<div class="alignleft testimonialimg">
					<img src="<?php echo esc_url( $img[ 'src' ] ); ?>" width="<?php echo esc_attr( $img[ 'width' ] ); ?>" height="<?php echo esc_attr( $img[ 'height' ] ); ?>" alt="<?php echo esc_attr( $img[ 'alt' ] ); ?>" <?php echo wp_kses_post( $img[ 'srcset' ] );?> style="display: block; max-width:60px;">
				</div>
			<?php } else { ?>
				<div class="alignleft testimonialimg">
					<i class="icon-user2" style="font-size:60px"></i>
				</div>
			<?php } 
			if( 'true' == $kt_testimonial_loop[ 'limit' ] ) {
				echo esc_attr( strip_tags( virtue_content( $kt_testimonial_loop[ 'words' ] ) ) ); 
			} else {
				the_content(); 
			}
			if( 'true' == $kt_testimonial_loop[ 'link' ]  ) {
				echo '<a href="'.get_the_permalink().'" class="kadtestimoniallink">';
					echo wp_kses_post( $kt_testimonial_loop[ 'linktext' ] );
				echo '</a>';
			} ?>
		</div>
		<div class="testimonialbottom">
			<div class="lipbg kad-arrow-down"></div>
			<p><strong><?php the_title();?></strong>
				<?php $location = get_post_meta( $post->ID, '_kad_testimonial_location', true ); 
					if ( ! empty( $location ) ) {
						echo ' - ' . wp_kses_post( $location );
					}
				?>
			</p>
		</div>
	</div>
</div>