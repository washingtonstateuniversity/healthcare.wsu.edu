<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?>><!--<![endif]-->


<?php // CUSTOMIZATION
	$spine_options = get_option( 'spine_options' );
	$grid_style = $spine_options['grid_style'];
	$spine_color = $spine_options['spine_color'];
	$large_format = $spine_options['large_format'];
	?>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]--> 
	<title><?php wp_title( '|', true, 'right' ); ?> Washington State University</title>
	
	<!-- CONTACT -->
	<?php get_template_part('parts/head','contact'); ?> 
	
	<!-- FAVICON -->
	<link rel="shortcut icon" href="http://repo.wsu.edu/spine/1/favicon.ico" />
	
	<!-- STYLESHEETS -->
	<!-- TARGET --><link href="http://repo.wsu.edu/spine/1/spine.min.css" rel="stylesheet" type="text/css" /><!-- -->
	<!-- Your custom stylesheets here -->
	
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
	
	<!-- RESPOND -->
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!-- TARGET --><script src="http://repo.wsu.edu/spine/1/spine.min.js"></script><!-- -->
	<!-- Your supplementary scripts here -->
	<!-- COMPATIBILITY -->
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/d3.v3.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/nv.d3.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/utils.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/tooltip.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/models/legend.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/models/axis.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/models/multiBarHorizontal.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/models/multiBarHorizontalChart.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/models/pie.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/models/pieChart.js"></script>
<script src="/wp-content/themes/wsu-sandbox/assets/scripts/stream_layers.js"></script>
	<!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js">IE7_PNG_SUFFIX=".png";</script><![endif]--> 
<noscript><style>#spine #spine-sitenav ul ul li { display: block !important; }</style></noscript>
	<!-- DOCS -->
	<link href="http://repo.wsu.edu/spine/1/authors.txt" rel="authors" type="text/plain">
	<link type="text/html" rel="docs" href="http://brand.wsu.edu" />
	
	<!-- ANALYTICS -->
	<!-- Your analytics code here -->
	
	<?php wp_head(); ?>
	<script>$ = jQuery;</script>

</head>

<body <?php body_class(); ?>>

<div id="jacket" class="spineless">
<!-- Accent banner to stretch across the page -->
<div id="binder" class="<?php echo $grid_style; echo $large_format; ?>">