
<?php while (have_posts()) : the_post(); ?>
  <?php the_title('<h1>', '</h1>'); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>')); ?>
<?php endwhile; ?>

<?php
  $args = array(  
    'post_type' => 'property',
    'tax_query' => array(
      array(
        'taxonomy' => 'tax_feature',
        'field' => 'slug',
        'terms' => 'hotels',
      )
    ),
    'posts_per_page' => 3
  );

  $loop = new WP_Query( $args ); ?>

  <section class="featured-hotels">
    <h2>Featured Hotels</h2>
    <div class="parent-container">
      <div class="row">
        <?php
          while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="col-md-4 featured-item">
            <?php
              the_post_thumbnail('large');
              the_title('<h3>','</h3>');
              the_excerpt();
            ?>
          </div>

        <?php
          endwhile;
        ?>
      </div>
    </div>
  </section>
  
  <?php
  wp_reset_postdata();

  // echo do_shortcode('[listing_feature feature="hotels" limit="3" template="slim"]');
?>