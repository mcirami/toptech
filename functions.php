<?php
/**
 * boiler functions and definitions
 *
 * @package boiler
 */

if ( ! function_exists( 'boiler_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function boiler_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'boiler' ),
		'footer' =>  __( 'Footer Menu', 'boiler'),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // boiler_setup
add_action( 'after_setup_theme', 'boiler_setup' );

// add parent class to menu items 
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'parent-item'; 
		}
	}
	
	return $items;
}

	
/* remove some of the header bloat */

// EditURI link
remove_action( 'wp_head', 'rsd_link' );
// windows live writer
remove_action( 'wp_head', 'wlwmanifest_link' );
// index link
remove_action( 'wp_head', 'index_rel_link' );
// previous link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
// WP version
remove_action( 'wp_head', 'wp_generator' );

// remove pesky injected css for recent comments widget
add_filter( 'wp_head', 'boiler_remove_wp_widget_recent_comments_style', 1 );
// clean up comment styles in the head
add_action('wp_head', 'boiler_remove_recent_comments_style', 1);
// clean up gallery output in wp
add_filter('gallery_style', 'boiler_gallery_style');

// Thumbnail image sizes
// add_image_size( 'thumb-400', 400, 400, true );
add_image_size('featured-thumb', 400, 250, false);

// remove injected CSS for recent comments widget
function boiler_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function boiler_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function boiler_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function boiler_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'boiler' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'boiler_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function boiler_scripts_styles() {
	// style.css just initializes the theme. This is compiled from /sass
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css');
	
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/js/flexslider/flexslider.css');
	
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.css');
	
	wp_enqueue_style( 'mmenu-positioning', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.positioning.css');
	
	wp_enqueue_style( 'mmenu-searchfield', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.searchfield.css');
	
	wp_enqueue_style( 'tabby', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css');
	
	wp_enqueue_style( 'tabby', get_template_directory_uri() . '/css/vendor/tabby.min.css');
	
	wp_enqueue_script( 'jquery' , array(), '', true );

	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', '2.6.2', true );

	//wp_enqueue_script( 'boiler-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20120206', true );

	//wp_enqueue_script( 'boiler-main', get_template_directory_uri() . '/js/main.js', array(), '20120205', true );
	
	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.min.js', array('jquery'), true );
	
	wp_enqueue_script( 'mmenu-searchfield', get_template_directory_uri() . '/js/mmenu/jquery.mmenu.searchfield.min.js', array('jquery'), true );
	
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/vendor/jquery.easing.js', array('jquery'), true );
	
	wp_enqueue_script( 'quicksand', get_template_directory_uri() . '/js/vendor/quicksand.js', array('jquery'), true );
	
	wp_enqueue_script( 'classList', get_template_directory_uri() . '/js/vendor/classList.js', array('jquery'), true );
	
	wp_enqueue_script( 'tabby', get_template_directory_uri() . '/js/vendor/tabby.js', array('jquery'), true );
	
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.js', true );
	
	// Return concatenated version of JS. If you add a new JS file add it to the concatenation queue in the gruntfile. 
	// current files: js/vendor.mordernizr-2.6.2.min.js, js/plugins.js, js/main.js
	wp_enqueue_script( 'boiler-concat', get_template_directory_uri() . '/js/built.min.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'boiler_scripts_styles' );

/**
* Custom Post Types
*/
require get_template_directory() . '/inc/post-types.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// Auto wrap embeds with video container to make video responsive
function wrap_embed_with_div($html, $url, $attr) {
     return '<div class="video_container">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);


/* Add Placeholder fields to Gravity Forms */

/* Add a custom field to the field editor (See editor screenshot) */
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);

function my_standard_settings($position, $form_id){

// Create settings on position 25 (right after Field Label)

	if($position == 25){
	?>
			
		<li class="admin_label_setting field_setting" style="display: list-item; ">
			<label for="field_placeholder">Placeholder Text

				<!-- Tooltip to help users understand what this field does -->
				<a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>
						
			</label>
				
		<input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
				
		</li>
	<?php
	}
}

/* Now we execute some javascript technicalitites for the field to load correctly */

add_action("gform_editor_js", "my_gform_editor_js");

function my_gform_editor_js(){
?>
	<script>
		//binding to the load field settings event to initialize the checkbox
		jQuery(document).bind("gform_load_field_settings", function(event, field, form){
		jQuery("#field_placeholder").val(field["placeholder"]);
		});
	</script>

<?php
}

if(function_exists('acf_add_options_page')) { 
 
	acf_add_options_page();
	acf_add_options_sub_page('Options');
 
}

function custom_field_excerpt($title) {
	global $post;
	$text = get_field($title);
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 50; // 50 words
		//$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length);
	}
	return apply_filters('the_excerpt', $text);
}

add_filter( 'postmeta_form_limit' , 'customfield_limit_increase' );
function customfield_limit_increase( $limit ) {
	$limit = 400;
	return $limit;
}