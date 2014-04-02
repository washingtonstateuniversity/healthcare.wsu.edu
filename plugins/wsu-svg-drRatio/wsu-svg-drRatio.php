<?php
/*
Plugin Name: WSU SVG Dr Ratio
Plugin URI: http://sandbox.wsu.edu/assets/
Description: Allows users to register for assets.
Author: washingtonstateuniversity, jeremyfelt
Author URI: http://web.wsu.edu/
Version: 0.1.3
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class svg_wa_drRatio {

	/**
	 * Setup the hooks.
	 */
	public function __construct() {

		add_shortcode( 'svg_wa_drRatio',    array( $this, 'svg_wa_drRatio_display' ) );
	}

	/**
	 * Handle the display of the svg_ shortcode.
	 *
	 * @return string HTML output
	 */
	public function svg_wa_drRatio_display() {
		// Build the output to return for use by the shortcode.
		ob_start();
		?>
<div id="rdRatio"><header>
<h3>Rural Washington's acute shortage of primary care physicians</h3>
</header><header>
<h4>No. of residents in the U.S. to physician ratio</h4>
</header>
<div class="justice">
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="equals">:</div>
<div class="dr"></div>
<div class="dr"></div>
</div>
<header>
<h4>Eastern WA resident to physician ratio</h4>
</header>
<div class="justice">
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="resident"></div>
<div class="equals">:</div>
<div class="dr"></div>
</div>
</div>
		<?php
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
new svg_wa_drRatio();
