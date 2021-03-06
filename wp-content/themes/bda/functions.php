<?php
/**
 * bda functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bda
 */

if ( ! function_exists( 'bda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bda_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bda, use a find and replace
	 * to change 'bda' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bda', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	* This theme uses two Top nav manus
	* Frist one is the Top menu
	*/
	register_nav_menus( array(
		'top_menu' => esc_html__( 'Top Menu', 'bda' ),
	) );

	// The second one is the Primary menu.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bda' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bda_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Set up image size for post post thumbnails
	add_image_size( 'upcomming-events-thumb', 282, 216, true );
}
endif; // bda_setup
add_action( 'after_setup_theme', 'bda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bda_content_width', 640 );
}
add_action( 'after_setup_theme', 'bda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bda_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area1', 'bda' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div class="col-sm-2 footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area2', 'bda' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div class="col-sm-2 footer-widget last-column">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Mobile', 'bda' ),
		'id'            => 'footer-mobile',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Custom Widget Area', 'bda' ),
		'id'            => 'custom-widget-area',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bda_scripts() {


	wp_enqueue_script( 'bda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Bootstrap style
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

	//Meanmenu style
	wp_enqueue_style( 'meanmenu-style', get_template_directory_uri() . '/css/meanmenu.css' );

	// wp_enqueue_style( 'acfdatepciker', 'http://202.166.207.19/bda/wp-content/plugins/advanced-custom-fields-pro/assets/inc/datepicker/jquery-ui-1.10.4.custom.min.css?ver=5.3.2.2' );

	//Style
	wp_enqueue_style( 'bda-style', get_stylesheet_uri() );

	//Custom style
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css' );

	//Staff style
	if( is_tax( 'staff_category' ) ) {
		wp_enqueue_style( 'magnific-style', get_template_directory_uri() . '/js/magnific-popup.css' );
		wp_enqueue_style( 'staff-style', get_template_directory_uri() . '/css/staff.css' );
		wp_enqueue_script( 'magnific-script', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '20130115', false );
	}

	//Responsive style
	wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/css/responsive.css' );

	//Font-awasome style
	wp_enqueue_style( 'Font-awasome-style', get_template_directory_uri() . '/css/font-awesome.min.css' );

	//Oswald Font
	wp_enqueue_style( 'oswald-font', '//fonts.googleapis.com/css?family=Oswald:400,300,700' );

	//Montserrat font
	wp_enqueue_style('montserrat-font', '//fonts.googleapis.com/css?family=Montserrat:400,700' );

	//Roboto + Slab font
	wp_enqueue_style( 'roboto-font', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100' );

	//Open + Sans
	wp_enqueue_style( 'open-font', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700' );

	// datepicker script
	wp_enqueue_script( 'jquery-ui-datepicker' );

	//Bootstrap scrpt
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20130115', false );

	// Customizer script
	wp_enqueue_script( 'customizer-script', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), '20130115', false );

	// Navigation script
	wp_enqueue_script( 'navigation-script', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20130115', false );

	// Meanmenu script
	wp_enqueue_script( 'meanmenu-script', get_template_directory_uri() . '/js/jquery.meanmenu.js', array( 'jquery' ), '20130115', false );

	// Custom script
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20130115', false );


    if ( function_exists( 'gravity_form_enqueue_scripts' ) ) {
        // newsletter subscription form
        gravity_form_enqueue_scripts(3);
    }



}
add_action( 'wp_enqueue_scripts', 'bda_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom customizer for bda
 */
require get_template_directory() . '/inc/custom-customizer.php';

/**
 * Custom post type for bda
 */
require get_template_directory() . '/inc/post-type.php';


/**
 * Custom functions for bda
 */
require get_template_directory() . '/inc/custom-functions.php';


/**
 * Custom Shortcode for bda
 */
require get_template_directory() . '/inc/custom-shortcodes.php';


/**
* Math captcha work
*/


function action_function_name_X( $field ) {
	// echo '<pre>';
 //    print_r( $field );
	if ( $field['_name'] == 'bda_numeric_x' || $field['_name'] == 'bda_numeric_y' || $field['_name'] == 'bda_numeric_z' ) {
		   // print_r( $field );
		// $field['wrapper'] = '';

		if( $field['_name'] == 'bda_numeric_y' || $field['_name'] == 'bda_numeric_z') {
			//$field['label'] = '';

		}
		if( $field['_name'] == 'bda_numeric_x' || $field['_name'] == 'bda_numeric_y' ) {

    		$field['value'] = rand(1,9);
    		$field['readonly'] = 1;
    		$field['disabled'] = 1;

		}
    }

	return $field;


}
function action_function_name_y( $field ) {
	// echo '<pre>';
 //    print_r( $field );[]
    if ( $field['_name'] == 'bda_numeric_x' ) {
    	// $ops = array('+','-','*');
    	$ops = array('+');
    	$rand_key = array_rand($ops);
    	//echo '<div class="acf-label"><label>NUMERIC CAPTCHA</lable></div>';
    	echo '<span id="bda_numeric_operator">' . $ops[$rand_key]  . '</span>';
    } elseif( $field['_name'] == 'bda_numeric_y' ) {
    	echo '<span> = </span>';
    }

}

add_action( 'acf/prepare_field/type=text', 'action_function_name_x', 10, 1 );
add_action( 'acf/render_field/type=text', 'action_function_name_y', 10, 1 );



// deactivate the acf-field-date-time-picker plugin update notice
function filter_plugin_updates( $value ) {
    unset( $value->response['acf-field-date-time-picker/acf-date_time_picker.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

?>
