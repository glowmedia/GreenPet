// Set domain for browsersync to proxy
var domain = "http://sccl.nhs.local/";

// Define plugins
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var notify = require('gulp-notify');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var uglify = require("gulp-uglify");
var sassGlobbing = require('gulp-sass-glob');
var concat = require('gulp-concat');
var ignore = require('gulp-ignore');

// Process styles
gulp.task('sass', function () {
    return gulp.src("./sass/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sassGlobbing())
        .pipe(sass()
            .on('error', notify.onError({
                title: 'SASS Error',
                message: '<%= error.message %>'
            }))
        )
        .pipe(autoprefixer({browsers: ['last 3 versions', 'ie 9']}))
        .pipe(cssnano())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest("../"))
        .pipe(browserSync.stream({match: '../style.css'}));
});

// Process IE specific styles
gulp.task('sass-ie', function () {
    return gulp.src("./ie/ie.scss")
        .pipe(sourcemaps.init())
        .pipe(sassGlobbing())
        .pipe(sass()
            .on('error', notify.onError({
                title: 'SASS Error',
                message: '<%= error.message %>'
            }))
        )
        //.pipe(cssnano())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest("./ie/"));
});

// Process admin area styles
gulp.task('sass-admin', function () {
    return gulp.src("./admin/admin.scss")
        .pipe(sourcemaps.init())
        .pipe(sassGlobbing())
        .pipe(sass()
            .on('error', notify.onError({
                title: 'SASS Error',
                message: '<%= error.message %>'
            }))
        )
        .pipe(cssnano())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest("./admin/"));
});

// Process javascript
gulp.task('minify-js', function () {
    var ie8_safe = {
        compress: {screw_ie8: false},
        mangle: {screw_ie8: false},
        output: {screw_ie8: false}
    };
    gulp.src([
        './node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
        './node_modules/js-cookie/src/js.cookie.js',
        './js/*.js',
        '!./js/vendor/*.js',
        '!./js/admin/*.js'
    ])
        .pipe(concat('compiled.min.js'))
        .pipe(uglify(ie8_safe))
        .pipe(gulp.dest('js/compiled'));
});

// Copy the third-party fonts to the assets dir
gulp.task('copy-fonts', function () {
    return gulp.src('./node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest('./fonts/'));
});

// Browsersync
gulp.task('browsersync', ['sass'], function () {
    browserSync.init({
        files: ["../style.css"],
        proxy: domain,
        open: false,
        port: 3000,
        injectChanges: true,
        ghostMode: false,
        reloadDelay: 1000
    });
});

// Watch
gulp.task('watch', ['browsersync'], function () {
    gulp.watch("./sass/**/*.scss", ['sass']);
    gulp.watch('./style.scss', ['sass']);
    gulp.watch("./js/*.js", ['minify-js']);
    gulp.watch('./ie/sass/*.scss', ['sass-ie']);
    gulp.watch('./admin/sass/*.scss', ['sass-admin']);
    gulp.watch([
        "../pages/*.php",
        "../partials/**/*.php",
        "../templates/*.php",
        "/.js/*.js"
    ]).on('change', browserSync.reload);
});

// Provide default task for gulp
gulp.task('default', function () {
    gulp.start("watch");
    gulp.start("copy-fonts");
    gulp.start("sass-ie");
    gulp.start("sass-admin");
    gulp.start("minify-js");
});
