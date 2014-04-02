<?php
/*
Plugin Name: WSU SVG Med School Grads
Plugin URI: http://sandbox.wsu.edu/assets/
Description: Allows users to register for assets.
Author: washingtonstateuniversity, jeremyfelt
Author URI: http://web.wsu.edu/
Version: 0.1.3
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class svg_wa_medschoolgrads {

	/**
	 * Setup the hooks.
	 */
	public function __construct() {

		add_shortcode( 'svg_wa_medschoolgrads',    array( $this, 'svg_wa_medschoolgrads_display' ) );
	}

	/**
	 * Handle the display of the svg_wa_map shortcode.
	 *
	 * @return string HTML output
	 */
	public function svg_wa_medschoolgrads_display() {
		// Build the output to return for use by the shortcode.
		ob_start();
		?>
		  <div id="medschoolgrads" class='with-3d-shadow with-transitions'>
    <svg width="720" height="466"></svg>
  </div>
  <script>

long_short_data = [ 
  {
    key: 'Medical School graduates per 100,000 residents',
    color: '#F26D4E',
    values: [
      { 
        "label" : "Washington" ,
        "value" : 3
      } , 
      { 
        "label" : "Missouri" ,
        "value" : 15.2
      } , 
     
    ]
  },
  
];




var chart;
nv.addGraph(function() {
  chart = nv.models.multiBarHorizontalChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .margin({top: 30, right: 20, bottom: 50, left: 175})
      //.showValues(true)
      //.tooltips(false)
      .barColor(d3.scale.category20().range())
      .transitionDuration(250)
      .stacked(false)
      .showControls(false);

  chart.yAxis
      .tickFormat(d3.format(',.2f'));

  d3.select('#medschoolgrads svg')
      .datum(long_short_data)
      .call(chart);

  nv.utils.windowResize(chart.update);

  chart.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

  return chart;
});



</script>

		<?php
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
new svg_wa_medschoolgrads();
