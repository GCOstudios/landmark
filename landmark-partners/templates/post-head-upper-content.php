<?php 
global $post, $virtue_premium;
    $height = get_post_meta( $post->ID, '_kad_posthead_height', true ); 
    if (!empty($height)) {
      $slideheight = $height;
    } else {
      $slideheight = 400;
    }
    $kt_headcontent = get_post_meta( $post->ID, '_kad_blog_head', true );
    if(empty($kt_headcontent) || $kt_headcontent == 'default') {
        if(!empty($virtue_premium['post_head_default'])) {
            $kt_headcontent = $virtue_premium['post_head_default'];
        } else {
            $kt_headcontent = 'none';
        }
    }
    if ($kt_headcontent == 'carousel') { 
        echo '<div class="postfeat kt-upper-head-content carousel_outerrim">';
       	 	 echo '<div class="slick-slider kad-light-wp-gallery kt-slickslider kt-image-carousel loading" data-slider-center-mode="true" data-slider-speed="7000" data-slider-anim-speed="400" data-slider-fade="false" data-slider-type="carousel" data-slider-auto="true" data-slider-arrows="true">';
				$image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
              	if(!empty($image_gallery)) {
                	$attachments = array_filter( explode( ',', $image_gallery ) );
                } else {
              		$attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
                	$attachments_posts = get_posts($attach_args);
                    $attachments = array();
				    foreach ($attachments_posts as $val) {
				      	$attachments[] = $val->ID;
				    }
              	}
              	if ($attachments) {
                    foreach ($attachments as $attachment) {
                    	$alt = get_post_meta($attachment, '_wp_attachment_image_alt', true);
                        $img = virtue_get_image_array(null, $slideheight, true, null, $alt, $attachment, false);
                    	// Lazy Load
                       	if( kad_lazy_load_filter() ) {
                          	$image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($image[0]).'" '; 
                       	} else {
                          	$image_src_output = 'src="'.esc_url($img['src']).'"'; 
                       	}
                       	echo '<div class="kt-slick-slide gallery_item">';
	                       	echo '<a href="'.esc_url($img['full']).'" data-rel="lightbox" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
	                            echo '<img '.$image_src_output.' width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" itemprop="contentUrl" alt="'.esc_attr($img['alt']).'" data-caption="'.esc_attr(get_post_field('post_excerpt', $attachment)).'" '.$img['srcset'].' />';
								echo '<meta itemprop="url" content="'.esc_url($img['full']).'">';
								echo '<meta itemprop="width" content="'.esc_attr($img['width']).'">';
								echo '<meta itemprop="height" content="'.esc_attr($img['height']).'">';
	                        echo '</a>';
                        echo '</div>';
                    }
                }

            echo '</div>';
        echo '</div>';
    } else if ($kt_headcontent == 'shortcode') { ?>
      <div class="sliderclass kt-upper-head-content postfeat">
        <?php 
        $shortcodeslider = get_post_meta( $post->ID, '_kad_post_shortcode', true );
        if(!empty($shortcodeslider)) { 
            echo do_shortcode( $shortcodeslider ); 
        } ?>
         <?php if (has_post_thumbnail( $post->ID ) ) { 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="<?php echo esc_url($image[0]); ?>">
                        <meta itemprop="width" content="<?php echo esc_attr($image[1])?>">
                        <meta itemprop="height" content="<?php echo esc_attr($image[2])?>">
                    </div>
                    <?php } ?>
        </div><!--sliderclass-->
<?php } 
