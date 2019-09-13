<?php 
 	get_header();
 	?>
  	<div class="wrap clearfix contentclass hfeed custom-template" role="document">

        <?php do_action( 'kt_afterheader' );
        include kadence_template_path(); 
        ?>
        
      <?php if ( virtue_display_sidebar() ) : ?>
      <aside id="ktsidebar" class="<?php echo esc_attr( virtue_sidebar_class() ); ?> kad-sidebar" role="complementary">
        <div class="sidebar">
          <?php include kadence_sidebar_path(); ?>
        </div><!-- /.sidebar -->
      </aside><!-- /aside -->
      <?php endif; ?>
      </div><!-- /.row-->
      <?php do_action( 'kt_after_content' ); ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->
<?php
get_footer();
