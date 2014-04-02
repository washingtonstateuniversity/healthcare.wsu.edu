<?php
/*
Plugin Name: WSU SVG US Pie
Plugin URI: http://sandbox.wsu.edu/assets/
Description: Allows users to register for assets.
Author: washingtonstateuniversity, jeremyfelt
Author URI: http://web.wsu.edu/
Version: 0.1.3
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class svg_wa_uspie {

	/**
	 * Setup the hooks.
	 */
	public function __construct() {

		add_shortcode( 'svg_wa_uspie',    array( $this, 'svg_wa_uspie_display' ) );
	}

	/**
	 * Handle the display of the svg_ shortcode.
	 *
	 * @return string HTML output
	 */
	public function svg_wa_uspie_display() {
		// Build the output to return for use by the shortcode.
		ob_start();
		?>
<div class="row halves pieForAll">
<div class="column one">
	<h3>2013 applicants</h3>
<svg id="lmtAccess"></svg>
</div>
<div class="column two">
  <h3>2013 State of Washington applicants</h3>
<svg id="lmtAccessTwo"></svg>
</div>
</div>
<script>

  var usdata = [
    {
      key: "Total Applicants",
      y: 6015
    },
    {
      key: "Admitted",
      y: 235
    },
  ];


nv.addGraph(function() {
    var width = 300,
        height = 300;

    var chart = nv.models.pieChart()
        .x(function(d) { return d.key })
        .y(function(d) { return d.y })
        .color(d3.scale.category10().range())
        .width(width)
        .height(height)
        .color(['#F2EDDB', '#F26D4E', '#EEEF8D']);

      d3.select("#lmtAccess")
          .datum(usdata)
        .transition().duration(1200)
          .attr('width', width)
          .attr('height', height)
          .call(chart);

    chart.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

    return chart;
});
 var wadata = [
    {
      key: "Total Applicants",
      y: 800
    },
    {
      key: "Admitted",
      y: 120
    },
  ];


nv.addGraph(function() {
    var width = 300,
        height = 300;

    var chart = nv.models.pieChart()
        .x(function(d) { return d.key })
        .y(function(d) { return d.y })
        .color(d3.scale.category10().range())
        .width(width)
        .height(height)
        .color(['#F2EDDB', '#F26D4E', '#EEEF8D']);

      d3.select("#lmtAccessTwo")
          .datum(wadata)
        .transition().duration(1200)
          .attr('width', width)
          .attr('height', height)
          .call(chart);

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
new svg_wa_uspie();
