<?php

// Load healthcare shortcode plugin
include __DIR__ . '/plugins/healthcare-svg-shortcodes.php';

add_action( 'wp_enqueue_scripts', 'wsumed_enqueue_scripts' );
/**
 * Enqueue scripts used on the front end of the medicine.wsu.edu theme.
 */
function wsumed_enqueue_scripts() {
	global $wsuwp_global_version;
	wp_enqueue_script( 'wsu-jquery-ui-full', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'wsu-spine', 'http://repo.wsu.edu/spine/1/spine.js', array( 'wsu-jquery-ui-full' ), $wsuwp_global_version );
}

function my_mce_buttons_2($buttons) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'hr';
	$buttons[] = 'sup';
	$buttons[] = 'styleselect';

	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');
// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => '.blocks',  
			'block' => 'p',  
			'classes' => 'p',
			'wrapper' => true,
			
		),  
		array(  
			'title' => '⇠.rtl',  
			'block' => 'blockquote',  
			'classes' => 'rtl',
			'wrapper' => true,
		),
		array(  
			'title' => '.ltr⇢',  
			'block' => 'blockquote',  
			'classes' => 'ltr',
			'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

add_action( 'wp_footer', 'healthcare_display_analytics' );
function healthcare_display_analytics() {
	?><script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-48938496-2', 'wsu.edu');
	ga('send', 'pageview');

</script><?php
}