<?php 
add_action( 'wp_enqueue_scripts', 'landmark_partners_enqueue_styles' );

function landmark_partners_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  // wp_enqueue_style( 'child-style',  get_stylesheet_uri(), array('parent-style'));
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'hotel-thumb', 360, 251, true ); // (cropped)
}
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<h3>Welcome to the Landmark Parnership Theme! Need help? Contact the developer <a href="mailto:info@skyhaven.co.uk">here</a>. For WordPress Tutorials visit: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></h3>';
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');


function font_scripts() {
	wp_enqueue_style( 'custom_fonts', get_stylesheet_directory_uri() . '/custom-fonts/stylesheet.css' );
	}

add_action( 'wp_enqueue_scripts', 'font_scripts' );

function landmark_scripts() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style( 'gridder', get_stylesheet_directory_uri() . '/assets/jquery.gridder.min.css' );
    wp_enqueue_style( 'gridder-demo', get_stylesheet_directory_uri() . '/assets/demo.css' );
	wp_enqueue_script( 'scrollr', get_stylesheet_directory_uri() . '/assets/parallax.min.js', array('jquery'), '', true );
    wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', null, null, true );
    wp_enqueue_script('popper');
    wp_enqueue_script( 'grid', get_stylesheet_directory_uri() . '/assets/jquery.gridder.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/main.js', array( 'jquery' ), '1.0.0', true );
    // wp_enqueue_style( 'bootstrap-4','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
}

add_action( 'wp_enqueue_scripts', 'landmark_scripts' );

function revolver() {
  wp_register_script('call', get_stylesheet_directory_uri() . '/assets/call.js', false, 100, true);
  wp_enqueue_script('call');
  wp_register_script('cycle', get_stylesheet_directory_uri() . '/assets/jquery.cycle.all.js', false, 100, true);
  wp_enqueue_script('cycle');
}
add_action('wp_enqueue_scripts', 'revolver', 100);


function fetch_post_content() {
  if ( isset($_REQUEST) ) {
    $post_id = $_REQUEST['id'];
  ?>

      <h1><?php echo get_the_title($post_id); ?></h1>
      <?php echo wpautop(get_the_content($post_id)); ?>

  <?php
  }
  die();
}

add_action( 'wp_ajax_fetch_post_content', 'fetch_post_content' );
add_action( 'wp_ajax_nopriv_fetch_post_content', 'fetch_post_content' );


/**
 * Register Sidebar
 */
function landmark_register_sidebars() {
 
    /* Register the primary sidebar. */
register_sidebar(
        array(
            'id' => 'property-banner',
            'name' => __( 'Main Property Page Banner', 'landmark' ),
            'description' => __( 'Add image here for additional pages', 'landmark' ),
            'before_widget' => '<div id="second-banner" class="banner-image">',
            'after_widget' => '</div>',
            'before_title' => '<div class="text-overlay"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );

register_sidebar(
        array(
            'id' => 'single-property-banner',
            'name' => __( 'Single Property Banner', 'landmark' ),
            'description' => __( 'Add image here for additional pages', 'landmark' ),
            'before_widget' => '<div id="second-banner" class="banner-image">',
            'after_widget' => '</div>',
            'before_title' => '<div class="text-overlay"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );

register_sidebar(
        array(
            'id' => 'single-property',
            'name' => __( 'Single Property Sidebar', 'landmark' ),
            'description' => __( 'widget area for single property listings', 'landmark' ),
            'before_widget' => '<section id="property-sidebar" class="widget-property"><div class="widget-inner">',
            'after_widget' => '</div></section>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );

register_sidebar(
        array(
            'id' => 'sectors-page',
            'name' => __( 'Sectors Page Banner', 'landmark' ),
            'description' => __( 'Add image here for additional pages', 'landmark' ),
            'before_widget' => '<div id="second-banner" class="banner-image">',
            'after_widget' => '</div>',
            'before_title' => '<div class="text-overlay"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );

register_sidebar(
        array(
            'id' => 'dealmap',
            'name' => __( 'Deal Map', 'landmark' ),
            'description' => __( 'Add shortcodes here', 'landmark' ),
            'before_widget' => '<div id="second-banner" class="banner-image">',
            'after_widget' => '</div>',
            'before_title' => '<div class="text-overlay"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );

register_sidebar(
        array(
            'id' => 'about-page',
            'name' => __( 'About Page Banner', 'landmark' ),
            'description' => __( 'Add shortcodes here', 'landmark' ),
            'before_widget' => '<div id="second-banner" class="banner-image">',
            'after_widget' => '</div>',
            'before_title' => '<div class="text-overlay"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );
register_sidebar(
array(
            'id' => 'blog',
            'name' => __( 'Blog Page Banner', 'landmark' ),
            'description' => __( 'Add shortcodes here', 'landmark' ),
            'before_widget' => '<div id="second-banner" class="banner-image">',
            'after_widget' => '</div>',
            'before_title' => '<div class="text-overlay"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );
 
    /* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'landmark_register_sidebars' );


function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

add_post_type_support( 'page', 'excerpt' );


function epl_sorting_options2($post_type = null) {

	if( is_null($post_type) ) {
		$post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : 'property';
	}

	return apply_filters('epl_sorting_options2',array(
		array(
			'id'		=>	'high',
			'label'		=>	__('Price: High to Low','easy-property-listings' ),
			'type'		=>	'meta',
			'key'		=>	is_epl_rental_post( $post_type ) ? 'property_rent':'property_price',
			'order'		=>	'DESC',
			'orderby'	=>	'meta_value_num',
		),
		array(
			'id'	=>	'low',
			'label'	=>	__('Price: Low to High','easy-property-listings' ),
			'type'	=>	'meta',
			'key'	=>	is_epl_rental_post( $post_type ) ? 'property_rent':'property_price',
			'order'	=>	'ASC',
			'orderby'	=>	'meta_value_num',

		),
/*
		array(
			'id'	=>	'status_asc',
			'label'	=>	__('For Sale','easy-property-listings' ),
			'type'	=>	'meta',
			'key'	=>	'property_status',
			'order'	=>	'ASC',
			'orderby'	=>	'meta_value',

		),
		array(
			'id'	=>	'status_desc',
			'label'	=>	__('Sold','easy-property-listings' ),
			'type'	=>	'meta',
			'key'	=>	'property_status',
			'order'	=>	'DESC',
			'orderby'	=>	'meta_value',

		),*/
	) );
}

/**
 * Switch Sorting
 *
 * @since 2.0
 */
function epl_switch_views_sorting2() {
	$sortby = '';
	if(isset($_GET['sortby']) && trim($_GET['sortby']) != ''){
		$sortby = sanitize_text_field(trim($_GET['sortby']));
	}
	do_action('epl_archive_utility_wrap_start');
	$sorters = epl_sorting_options2();
	?>
	<div class="epl-switching-sorting-wrap epl-clearfix">
		<?php do_action('epl_add_custom_menus'); ?>
		<span class="sorting label">SORT PROPERTIES BY:</span>
		<div class="epl-properties-sorting epl-clearfix">
			<select id="epl-sort-listings">
				<option <?php selected( $sortby, '' ); ?> value=""><?php echo apply_filters( 'epl_switch_views_sorting_title_sort' , __('Select','easy-property-listings' ) ); ?></option>
				<?php
					foreach($sorters as $sorter) { ?>
						<option <?php selected( $sortby, $sorter['id'] ); ?> value="<?php echo $sorter['id']; ?>">
							<?php echo $sorter['label']; ?>
						</option> <?php
					}
				?>
			</select>
		</div>
	</div>
	<?php
	do_action('epl_archive_utility_wrap_end');
}
// add_action( 'epl_property_loop_start2' , 'epl_switch_views_sorting2' , 20 );

function my_epl_listing_sort_status( $query ) {
    // Do nothing if in dashboard or not an archive page
    if ( is_admin() || ! $query->is_main_query() )
        return;

    // Do nothing if Easy Property Listings is not active
    if ( ! function_exists( 'epl_all_post_types' ) )
        return;

    // Sort EPL listings by price on archive page
    if ( is_post_type_archive( epl_all_post_types() == 'true' ) ) {
        $query->set( 'meta_key', 'property_status' );
            $query->set( 'orderby', array(
                    'meta_value'    => 'ASC',
                    'date'      => 'DESC'
                )
            );
        return;
    }
}
add_action( 'pre_get_posts', 'my_epl_listing_sort_status' , 99  );



function my_property_filter($query) {
    // Do nothing if is dashboard/admin or doing search
    if ( is_admin() || epl_is_search() )
        return;

    // The query to only show 'current' listings
    $meta_query = array(
        array(
            'key'=>'property_status',
            'value'=>'current',
            'compare'=>'==',
        ),
    );

    // Only show current listings on your main /property/ page
    if ( $query->is_main_query() && is_post_type_archive( 'property' ) ) {
        $query->set('meta_query',$meta_query);
            return;
    }

    // Only show current listings on your main /rental/ page
    if ( $query->is_main_query() && is_post_type_archive( 'rental' ) ) {
        $query->set('meta_query',$meta_query);
            return;
    }
}
add_action( 'pre_get_posts', 'my_property_filter' , 20  );

define('EPL_PROPERTY_SLUG', 'properties');


function get_hansel_and_gretel_breadcrumbs()
{
    // Set variables for later use
    $here_text        = __( 'You are currently here!' );
    $home_link        = home_url('/');
    $home_text        = __( 'Home' );
    $link_before      = '<span typeof="v:Breadcrumb">';
    $link_after       = '</span>';
    $link_attr        = ' rel="v:url" property="v:title"';
    $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter        = '&nbsp; &frasl; &nbsp;';              // Delimiter between crumbs
    $before           = '<span class="current">'; // Tag before the current crumb
    $after            = '</span>';                // Tag after the current crumb
    $page_addon       = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links   = '';

    /** 
     * Set our own $wp_the_query variable. Do not use the global variable version due to 
     * reliability
     */
    $wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if ( is_singular() ) 
    {
        /** 
         * Set our own $post variable. Do not use the global variable version due to 
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post( $queried_object );

        // Set variables 
        $title          = apply_filters( 'the_title', $post_object->post_title );
        $parent         = $post_object->post_parent;
        $post_type      = $post_object->post_type;
        $post_id        = $post_object->ID;
        $post_link      = $before . $title . $after;
        $parent_string  = '';
        $post_type_link = '';

        if ( 'post' === $post_type ) 
        {
            // Get the post categories
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                // Lets grab the first category
                $category  = $categories[0];

                $category_links = get_category_parents( $category, true, $delimiter );
                $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
                $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
            }
        }

        if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) )
        {
            $post_type_object = get_post_type_object( $post_type );
            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
        }

        // Get post parents if $parent !== 0
        if ( 0 !== $parent ) 
        {
            $parent_links = [];
            while ( $parent ) {
                $post_parent = get_post( $parent );

                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse( $parent_links );

            $parent_string = implode( $delimiter, $parent_links );
        }

        // Lets build the breadcrumb trail
        if ( $parent_string ) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ( $post_type_link )
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ( $category_links )
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if( is_archive() )
    {
        if (    is_category()
             || is_tag()
             || is_tax()
        ) {
            // Set the variables for this section
            $term_object        = get_term( $queried_object );
            $taxonomy           = $term_object->taxonomy;
            $term_id            = $term_object->term_id;
            $term_name          = $term_object->name;
            $term_parent        = $term_object->parent;
            $taxonomy_object    = get_taxonomy( $taxonomy );
            $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
            $parent_term_string = '';

            if ( 0 !== $term_parent )
            {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ( $term_parent ) {
                    $term = get_term( $term_parent, $taxonomy );

                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                    $term_parent = $term->parent;
                }

                $parent_term_links  = array_reverse( $parent_term_links );
                $parent_term_string = implode( $delimiter, $parent_term_links );
            }

            if ( $parent_term_string ) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif ( is_author() ) {

            $breadcrumb_trail = __( 'Author archive for ') .  $before . $queried_object->data->display_name . $after;

        } elseif ( is_date() ) {
            // Set default variables
            $year     = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day      = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ( $monthnum ) {
                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                $month_name = $date_time->format( 'F' );
            }

            if ( is_year() ) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif( is_month() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif( is_day() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif ( is_post_type_archive() ) {

            $post_type        = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object( $post_type );

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }   

    // Handle the search page
    if ( is_search() ) {
        $breadcrumb_trail = __( 'Search query for: ' ) . $before . get_search_query() . $after;
    }

    // Handle 404's
    if ( is_404() ) {
        $breadcrumb_trail = $before . __( 'Error 404' ) . $after;
    }

    // Handle paged pages
    if ( is_paged() ) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        $page_addon   = $before . sprintf( __( ' ( Page %s )' ), number_format_i18n( $current_page ) ) . $after;
    }

    $breadcrumb_output_link  = '';
    $breadcrumb_output_link .= '<div class="breadcrumb"><div class="breadcrumb-inner">';
    if (    is_home()
         || is_front_page()
    ) {
        // Do not show breadcrumbs on page one of home and frontpage
        if ( is_paged() ) {
            $breadcrumb_output_link .=  $delimiter;
            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else {

        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</div></div><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;
}


 // unhook sidebar on custom page templates

function custom_no_sidebar_on_template($sidebar) {
  if ( is_page_template('page-sectors.php') ) {
    return false;
}
      if ( is_page_template('page-dealmap.php') ) {
    return false;
  }
  return $sidebar;
}

add_filter('kadence_display_sidebar', 'custom_no_sidebar_on_template');



 // duplicate posts and pages



function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }
 
    /*
     * Nonce verification
     */
    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
        return;
 
    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );
 
    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
 
    /*
     * if post data exists, create the post duplicate
     */
    if (isset( $post ) && $post != null) {
 
        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );
 
        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post( $args );
 
        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
 
        /*
         * duplicate all post meta just in two SQL queries
         */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if( $meta_key == '_wp_old_slug' ) continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
 
 
        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */

 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

function custom_duplicate_post_link( $actions, $post ) {
    if ($post->post_type=='property' && current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;

    add_filter( 'post_row_actions', 'custom_duplicate_post_link', 10, 2 );
}

function auto_featured_image() {
    global $post;
 
    if (!has_post_thumbnail($post->ID)) {
        $attached_image = get_children( "post_parent=$post->ID&amp;post_type=attachment&amp;post_mime_type=image&amp;numberposts=1" );
         
      if ($attached_image) {
              foreach ($attached_image as $attachment_id => $attachment) {
                   set_post_thumbnail($post->ID, $attachment_id);
              }
         }
    }
}
// Use it temporary to generate all featured images
add_action('the_post', 'auto_featured_image');
// Used for new posts
add_action('save_post', 'auto_featured_image');
add_action('draft_to_publish', 'auto_featured_image');
add_action('new_to_publish', 'auto_featured_image');
add_action('pending_to_publish', 'auto_featured_image');
add_action('future_to_publish', 'auto_featured_image');



//Integrates MemberPress with https://wordpress.org/plugins/invisible-recaptcha/
//This is untested code ATM
function add_invisible_recaptcha_mepr_signup($membership_ID) {
  ?>
    <div class="mp-form-row mepr_invisible_recaptcha">
      <?php do_action('google_invre_render_widget_action'); ?>
    </div>
  <?php
}
add_filter('mepr-checkout-before-submit', 'add_invisible_recaptcha_mepr_signup');

function validate_invisible_recaptcha_mepr_signup($errors) {
  $is_valid = apply_filters('google_invre_is_valid_request_filter', true);
  if(!$is_valid) {
    $errors[] = "Failed Captcha";
  }
  return $errors;
}
add_filter('mepr-validate-signup', 'validate_invisible_recaptcha_mepr_signup');



 ?>