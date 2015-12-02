<?php

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

remove_action( 'genesis_loop', 'genesis_do_loop' );


/*Get rid of Entry on home page*/

add_action( 'genesis_header', 'lwm_remove_home_heading' );
function lwm_remove_home_heading() {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
    }




//* Intro Image plus additional images for specific devices
add_action('genesis_before_header', 'top_background');
	function top_background () {
	echo '<div class="girl_in_wind_section">';			
	echo '<img src="http://www.listentothewindmedia.com/wp-content/uploads/2015/06/listen_to_the_wind_media_mastLato3.jpg">';
	echo '</div>'; 
	echo '<div class="girl_in_wind_section_iphone6plus">';
	echo '<img src="http://www.listentothewindmedia.com/wp-content/uploads/2015/07/listen_to_the_wind_media_iphone6plug.jpg">';
	echo '</div>'; 
}




//* Hooks both Widgets
add_action( 'genesis_before_content_sidebar_wrap', 'lwm_main_image_widget', 5 );
	function lwm_main_image_widget() {
	echo '<div class="lwm_top_area_block">';
	echo '<div class="wrap image_copy_area">';
	echo '<div class="slogan">';
	echo '<h2>Web Design Solutions That Look Great On Any Device</h2>';
	echo '</div>';
		genesis_widget_area( 'web_design_image', array(
			'before' => '<div class="home_image">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'web_design_copy', array(
			'before' => '<div class="home_copy">',
			'after' => '</div>',
	) );
	echo '</div>';
	echo '</div>';  
}

//* Second Row - Services Block (Web Designs Modifications Hosting)

add_action( 'genesis_before_content_sidebar_wrap', 'lwm_services', 6 );
	function lwm_services() {
	echo '<div class="lwm_services_block">';
	echo '<div class="wrap service_block">';
		genesis_widget_area( 'services_web_design', array(
			'before' => '<div class="services_wd">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'services_mods', array(
			'before' => '<div class="services_mm">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'services_host', array(
			'before' => '<div class="services_hosting">',
			'after' => '</div>',
	) );
	echo '</div>'; 
	echo '</div>'; 	
}


//* Web Gallery (Web Design Demos)


//* Hooks Widgets
add_action( 'genesis_before_content_sidebar_wrap', 'lwm_demos', 9 );
	function lwm_demos() {
	echo '<div class="lwm_websamples_block">';
	echo '<div class="wrap web_design_samples">';
    echo '<h2>Web Design Samples</h2>';

		genesis_widget_area( 'demos_column_one', array(
			'before' => '<div class="demos_column1">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'demos_column_two', array(
			'before' => '<div class="demos_column2">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'demos_column_three', array(
			'before' => '<div class="demos_column3">',
			'after' => '</div>',
	) );
	echo '</div>';
	echo '</div>';  
}






//* Blog, Testimonial Row

//* Hooks both Widgets
add_action( 'genesis_before_content_sidebar_wrap', 'lwm_column_left_23w', 8 );
	function lwm_column_left_23w() {
	echo '<div class="lwm_testimonial_blog_block">';
	echo '<div class="wrap testimonial_blog">';
		genesis_widget_area( 'testimonial', array(
			'before' => '<div class="lwm_testimonial">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'for_blog', array(
			'before' => '<div class="lwm_blog">',
			'after' => '</div>',
	) );
	echo '</div>';
	echo '</div>';  
}





//* Hooks both Blog and CTA Widgets
add_action( 'genesis_before_content_sidebar_wrap', 'under_header', 10 );
	function under_header() {
	echo '<div class="cta_blog_block">';
	echo '<div class="wrap cta_blog">';
		genesis_widget_area( 'cta_blog_left', array(
			'before' => '<div class="cta_blog_left">',
			'after' => '</div>',
	) );
			genesis_widget_area( 'cta_blog_right', array(
			'before' => '<div class="cta_blog_right">',
			'after' => '</div>',
	) );
	echo '</div>';
	echo '</div>';  

}






//* Addes floating menu to home page only
//add_action( 'wp_enqueue_scripts', 'custom_enqueue_script' );
//function custom_enqueue_script() {
///	wp_enqueue_script( 'sticky-nav', get_bloginfo( 'stylesheet_directory' ) . '/js/sticky-nav.js', array( 'jquery' ), '', true );
//}


//* Run the Genesis loop
genesis();