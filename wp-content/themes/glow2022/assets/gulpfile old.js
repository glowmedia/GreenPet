/**
 * Settings
 * Turn on/off build features
 */

var settings = {
	//clean: false,
	scripts: true,
	polyfills: true,
    styles: true,
    fonts: true,
	reload: true
};


/**
 * Paths to project folders
 */

var paths = {
	input: '/',
	output: '../',
	scripts: {
		input: './js/*',
		polyfills: '.polyfill.js',
		output: '../js/'
	},
	styles: {
		input: './sass/style.scss',
		output: '../'
    },
    fonts: {
        input: './node_modules/font-awesome/fonts/*',      
		output: '../fonts/'
	},
	reload: '../'
};

/**
 * Gulp Packages
 */

// General
var {gulp, src, dest, watch, series, parallel} = require('gulp');
var del = require('del');
var flatmap = require('gulp-flatmap');
var lazypipe = require('lazypipe');
var rename = require('gulp-rename');
var package = require('./package.json');

// Scripts
var jshint = require('gulp-jshint');
var stylish = require('jshint-stylish');
var concat = require('gulp-concat');
var uglify = require('gulp-terser');
var optimizejs = require('gulp-optimize-js');

// Styles
var sass = require('gulp-sass')(require('sass'));
var sassGlob = require('gulp-sass-glob');
var postcss = require('gulp-postcss');
var prefix = require('autoprefixer');
var minify = require('cssnano');
var sourcemaps = require('gulp-sourcemaps');

// fonts
var sass = require('gulp-sass');

// BrowserSync
var browserSync = require('browser-sync');


/**
 * Gulp Tasks
 */

// Remove pre-existing content from output folders
var cleanDist = function (done) {

	// Make sure this feature is activated before running
	if (!settings.clean) return done();

	// Clean the dist folder
	del.sync([
		paths.output
	]);

	// Signal completion
	return done();

};

//fontawesome
var moveFonts = function (done) {
    if (!settings.scripts) return done();
        return src(paths.fonts.input)
        .pipe(dest(paths.fonts.output));
}


// Lint, minify, and concatenate scripts
var buildScripts = function (done) {

	// Make sure this feature is activated before running
    if (!settings.scripts) return done();
        // Grab all files and concatenate them
        // If separate polyfills enabled, this will have .polyfills in the filename
        return src(paths.scripts.input)
        .pipe(uglify())
        .pipe(concat('compiled.min.js'))
        .pipe(dest(paths.scripts.output));
};

// Lint scripts
var lintScripts = function (done) {

	// Make sure this feature is activated before running
	if (!settings.scripts) return done();

	// Lint scripts
	return src(paths.scripts.input)
		.pipe(jshint())
		.pipe(jshint.reporter('jshint-stylish'));

};

// Process, lint, and minify Sass files
var buildStyles = function (done) {

	// Make sure this feature is activated before running
	if (!settings.styles) return done();

	// Run tasks on all Sass files
    return src(paths.styles.input)
        
        .pipe(sassGlob())
        .pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'expanded',
			sourceComments: true
		}))
		.pipe(postcss([
			prefix({
				cascade: true,
				remove: true
			})
		]))
		
		.pipe(dest(paths.styles.output))
		//.pipe(rename({suffix: '.min'}))
		.pipe(postcss([
			minify({
				discardComments: {
					removeAll: true
				}
			})
        ]))
        .pipe(sourcemaps.write('.'))
		.pipe(dest(paths.styles.output));

};

// Watch for changes to the src directory
var startServer = function (done) {

	// Make sure this feature is activated before running
	if (!settings.reload) return done();

	// Initialize BrowserSync
	browserSync.init({
		server: {
            baseDir: paths.reload,
            proxy: "http://sccl.nhs.local"
		}
	});

	// Signal completion
	done();

};

// Reload the browser when files change

var reloadBrowser = function (done) {
	if (!settings.reload) return done();
	browserSync.reload();
	done();
};


// Watch for changes
var watchSource = function (done) {
    watch(paths.input, series(exports.default, reloadBrowser));
    //watch(paths.input);
	done();
};


/**
 * Export Tasks
 */

exports.default = series(
	cleanDist,
	parallel(
		buildScripts,
		lintScripts,
        buildStyles,
        moveFonts,
	)
);

exports.watch = function() {

    watch('./sass/**/*', buildStyles);
    watch(paths.scripts.input, buildScripts);

};