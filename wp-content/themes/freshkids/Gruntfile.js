module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			options: {
				includePaths: ['bower_components/foundation/scss']
			},
			dist: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'css/style.css': 'css/sass/style.scss'
				}
			}
		},

		autoprefixer: {
			dist: {
				files: {
					'css/style.css' : 'css/style.css'
				}
			}
		},

		copy: {
			scripts: {
				expand: true,
				cwd: 'bower_components/foundation/js/vendor/',
				src: '**',
				flatten: 'true',
				dest: 'js/src/vendor/'
			},

			cycle2: {
				expand: true,
				cwd: 'bower_components/jquery-cycle2/build',
				src: 'jquery.cycle2.js',
				dest: 'js/src/custom'
			}
		},

		concat: {
			options: {
				separator: ';'
			},

			dist: {
				src: [
					// Include vendor scripts
					'js/src/vendor/*.js',

					// Project specific JS.
					'js/src/custom/*.js',

					// Foundation core
					'bower_components/foundation/js/foundation.js',

					// Pick the componenets you need in your project
					'bower_components/foundation/js/foundation/foundation.abide.js',
					'bower_components/foundation/js/foundation/foundation.accordion.js',
					'bower_components/foundation/js/foundation/foundation.alert.js',
					'bower_components/foundation/js/foundation/foundation.clearing.js',
					'bower_components/foundation/js/foundation/foundation.dropdown.js',
					'bower_components/foundation/js/foundation/foundation.equalizer.js',
					'bower_components/foundation/js/foundation/foundation.interchange.js',
					'bower_components/foundation/js/foundation/foundation.joyride.js',
					'bower_components/foundation/js/foundation/foundation.magellan.js',
					'bower_components/foundation/js/foundation/foundation.offcanvas.js',
					'bower_components/foundation/js/foundation/foundation.reveal.js',
					'bower_components/foundation/js/foundation/foundation.tab.js',
					'bower_components/foundation/js/foundation/foundation.tooltip.js',
					'bower_components/foundation/js/foundation/foundation.topbar.js',

					// Include main project JS
					'js/src/main.js'
				],
				// Concat all the files above into one single file
				dest: 'js/freshkids.js'
			}
		},

		uglify: {
			options: {
				preserveComments: 'some'
			},

			dist: {
				files: {
					// Shrink the file size by removing spaces
					'js/freshkids.min.js': ['js/freshkids.js']
				}
			}
		},

		watch: {
			sass: {
				files: 'css/**/*.scss',
				tasks: ['sass', 'autoprefixer']
			},

			js: {
				files: 'js/src/*.js',
				tasks: ['concat', 'uglify']
			},

			live_reload: {
				options: {
					livereload: true
				},
				files: ['css/*.css', 'js/*.js']
			}
		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-autoprefixer');

	grunt.registerTask('default', ['copy', 'concat', 'uglify', 'sass', 'autoprefixer', 'watch']);
};