module.exports = function(grunt) {

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			me: {
				src: [
					'assets/scripts/models/axis.js',
					'assets/scripts/models/legend.js',
					'assets/scripts/models/multiBarHorizontal.js',
					'assets/scripts/models/multiBarHorizontalChart.js',
					'assets/scripts/models/pie.js',
					'assets/scripts/models/pieChart.js',
					'assets/scripts/stream_layers.js',
					'assets/scripts/tooltip.js',
					'assets/scripts/utils.js'
				],
				dest: 'assets/scripts/wsumed.js'
			}
		},
		uglify: {
			me: {
				src    : ['assets/scripts/wsumed.js'],
				dest   : 'assets/scripts/wsumed.min.js',
			}
		}
	});


	grunt.registerTask('default', ['concat', 'uglify']);

};