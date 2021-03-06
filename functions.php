<?php

// Load healthcare shortcode plugin
include __DIR__ . '/plugins/healthcare-county-data.php';
include __DIR__ . '/plugins/healthcare-svg-shortcodes.php';

add_action( 'wp_enqueue_scripts', 'wsumed_enqueue_scripts' );
/**
 * Enqueue scripts used on the front end of the medicine.wsu.edu theme.
 */
function wsumed_enqueue_scripts() {
	wp_enqueue_script( 'wsu-jquery-ui-full', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'wsu-spine', '//repo.wsu.edu/spine/1/spine.js', array( 'wsu-jquery-ui-full' ), wsuwp_global_version() );

	// These scripts are required in the DOM
	wp_enqueue_script( 'wsumed-d3v3', get_stylesheet_directory_uri() . '/assets/scripts/d3.v3.min.js', array( 'wsu-spine' ), wsuwp_global_version(), false );
	wp_enqueue_script( 'wsumed-nvd3', get_stylesheet_directory_uri() . '/assets/scripts/nv.d3.min.js', array( 'wsumed-d3v3' ), wsuwp_global_version(), false );

	// These scripts load in the footer.
	if ( defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ) {
		wp_enqueue_script( 'wsumed-utils', get_stylesheet_directory_uri() . '/assets/scripts/utils.js', array( 'wsumed-nvd3' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-tooltip', get_stylesheet_directory_uri() . '/assets/scripts/tooltip.js', array( 'wsumed-utils' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-legend', get_stylesheet_directory_uri() . '/assets/scripts/models/legend.js', array( 'wsumed-tooltip' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-axis', get_stylesheet_directory_uri() . '/assets/scripts/models/axis.js', array( 'wsumed-legend' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-horiz', get_stylesheet_directory_uri() . '/assets/scripts/models/multiBarHorizontal.js', array( 'wsumed-axis' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-horizch', get_stylesheet_directory_uri() . '/assets/scripts/models/multiBarHorizontalChart.js', array( 'wsumed-horiz' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-pie', get_stylesheet_directory_uri() . '/assets/scripts/models/pie.js', array( 'wsumed-horizch' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-piech', get_stylesheet_directory_uri() . '/assets/scripts/models/pieChart.js', array( 'wsumed-pie' ), wsuwp_global_version(), true );
		wp_enqueue_script( 'wsumed-stream', get_stylesheet_directory_uri() . '/assets/scripts/stream_layers.js', array( 'wsumed-piech' ), wsuwp_global_version(), true );
	} else {
		wp_enqueue_script( 'wsumed-min', get_stylesheet_directory_uri() . '/assets/scripts/wsumed.min.js', array( 'wsumed-nvd3' ), wsuwp_global_version(), true );
	}
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