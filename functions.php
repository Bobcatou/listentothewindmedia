<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,700,300,400:latin', array(), CHILD_THEME_VERSION );

}


//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'sp_load_google_fonts_lato' );
function sp_load_google_fonts_lato() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}





//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );






//* Main menu*/

remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_before_header', 'genesis_do_nav', 5 );






//* Add new featured image sizes
add_image_size( 'home-service-area', 125, 125, TRUE );







//* First Row Widgets


//* Main Left Image
genesis_register_sidebar( array(
	'id'            => 'web_design_image',
	'name'          => __( 'Web Design Image Left', 'sample' ),
	'description'   => __( 'Main image left under video', 'sample' ),
) );

//* Copy to right of image
genesis_register_sidebar( array(
	'id'            => 'web_design_copy',
	'name'          => __( 'Web Design Copy Right', 'sample' ),
	'description'   => __( 'Text Blurb to right of main picture', 'sample' ),
) );


//* Second Row - Services Block (Web Designs Modifications Hosting)


//* Web Design Widget
genesis_register_sidebar( array(
	'id'            => 'services_web_design',
	'name'          => __( 'Services-Web Design', 'sample' ),
	'description'   => __( 'Web Design Blurb', 'sample' ),
) );

//* Modification Widget
genesis_register_sidebar( array(
	'id'            => 'services_mods',
	'name'          => __( 'Services-Modifications and Maintenance', 'sample' ),
	'description'   => __( 'Modifications and Maintenance Blurb', 'sample' ),
) );

//* Hosting Widget
genesis_register_sidebar( array(
	'id'            => 'services_host',
	'name'          => __( 'Service-Hosting', 'sample' ),
	'description'   => __( 'Hosting Blurb', 'sample' ),
) );



//* Web Gallery (Web Design Demos)

//* First Column
genesis_register_sidebar( array(
	'id'            => 'demos_column_one',
	'name'          => __( 'First Column of Demo Section', 'sample' ),
	'description'   => __( 'Website Samples First Column', 'sample' ),
) );
//* Second Column
genesis_register_sidebar( array(
	'id'            => 'demos_column_two',
	'name'          => __( 'Second Column of Demo Section', 'sample' ),
	'description'   => __( 'Website Samples Second Column', 'sample' ),
) );
//* Third Column
genesis_register_sidebar( array(
	'id'            => 'demos_column_three',
	'name'          => __( 'ThirdColumn of Demo Section', 'sample' ),
	'description'   => __( 'Website Samples Third Column', 'sample' ),
) );


//* Blog, Testimonial Row

//* 1st Column
genesis_register_sidebar( array(
	'id'            => 'testimonial',
	'name'          => __( 'Testimonial', 'sample' ),
	'description'   => __( 'For Testimonials', 'sample' ),
) );

//* Copy to right of image
genesis_register_sidebar( array(
	'id'            => 'for_blog',
	'name'          => __( 'Blog', 'sample' ),
	'description'   => __( 'Blog or Recent Post area', 'sample' ),
) );



//* Call to Action Blog left
genesis_register_sidebar( array(
	'id'            => 'cta_blog_left',
	'name'          => __( 'CTA or Blog Left', 'sample' ),
	'description'   => __( 'Call to Action and/or Blog area', 'sample' ),
) );

//* Call to Action Blog right
genesis_register_sidebar( array(
	'id'            => 'cta_blog_right',
	'name'          => __( 'CTA or Blog Right', 'sample' ),
	'description'   => __( 'Call to Action and/or Blog', 'sample' ),
) );












// Reposition header outside main wrap 
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 ) ;

add_action( 'genesis_before', 'genesis_header_markup_open', 5 );
add_action( 'genesis_before', 'genesis_do_header' );
add_action( 'genesis_before', 'genesis_header_markup_close', 15 );








/**
*Customer Support admin notice
/* */


function howdy_message($translated_text, $text, $domain) {
    $new_message = str_replace('Howdy', 'Call Listen to the Wind Media at 678-520-9914 if you have a question', $text);
    return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);

/**
 * Move Genesis child theme style sheet to a much later priority to give any plugins a chance to load first.
 * @author Alain Schlesser <alain.schlesser@gmail.com>
 *
 * @see http://docs.garyjones.co.uk/genesis/2.0.0/function-genesis_load_stylesheet.html
 */
function as_postpone_genesis_stylesheet() {

	// set very high priority for the enqueue action
	$priority = 999;

  // re-enqueue with high priority
	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', $priority );
}
add_action( 'genesis_setup', 'as_postpone_genesis_stylesheet' );







//* Create a shortcode to display our custom Go to top link
add_shortcode('footer_custombacktotop', 'set_footer_custombacktotop');
function set_footer_custombacktotop($atts) {
	return '
		<a href="#" class="top">Return to top of page</a>
	';
}



//* Add smooth scrolling for any link having the class of "top"
add_action('wp_footer', 'go_to_top');
function go_to_top() { ?>
	<script type="text/javascript">
        jQuery(function($) {
			$('a.top').click(function() {
            	$('html, body').animate({scrollTop:0}, 'slow');
				return false;
        	});
        });
	</script>
<?php }
	
	//* Change the footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] &middot; <a href="http://www.listentothewindmedia.com">Listen to the Wind Media</a>  &middot; [footer_custombacktotop]';
	return $creds;
}
//END OF SMOOTH SCROOL TO TOP


//* Enqueue jQuery core files from header to footer in WordPress
function rw_enqueue_jquery_in_footer( &$scripts ) {
    if ( ! is_admin() ) {
        $scripts->registered['jquery']->args = 1;
        $scripts->registered['jquery-core']->args = 1;
        $scripts->registered['jquery-migrate']->args = 1;
    }
}
add_action( 'wp_default_scripts', 'rw_enqueue_jquery_in_footer', 11 );

function rw_add_enqueue_jquery_in_footer() {
    wp_enqueue_script( 'jquery-core' );
    wp_enqueue_script( 'jquery-migrate' );
}
add_action( 'init', 'rw_add_enqueue_jquery_in_footer' );












//* Enqueue EQCSS
// http://elementqueries.com/
add_action( 'wp_enqueue_scripts', 'sk_enqueue_scripts' );
function sk_enqueue_scripts() {

	wp_enqueue_script( 'EQCSS', get_stylesheet_directory_uri() . '/js/EQCSS.min.js', '', '', true );

}

// Register bottom-flyout widget area
genesis_register_widget_area(
	array(
		'id'		  => 'bottom-flyout',
		'name'		  => __( 'Bottom Flyout', 'my-theme-text-domain' ),
		'description' => __( 'Widget(s) placed here will appear on scrolling down from bottom right', 'my-theme-text-domain' ),
));

// Display bottom-flyout widget area
add_action( 'wp_footer', 'sk_bottom_flyout' );
function sk_bottom_flyout() {

	genesis_widget_area( 'bottom-flyout', array(
		'before'	=> '<div class="bottom-flyout">',
		'after'		=> '</div>',
	));

}



