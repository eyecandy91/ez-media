var gulp = require('gulp');
var sass = require('gulp-sass');
var cssbeautify = require('gulp-cssbeautify');
var browserSync = require('browser-sync').create();
var uglify = require('gulp-uglify');
var pump = require('pump');
const purgecss = require('gulp-purgecss');

gulp.task('browserSync', function() {
  browserSync.init({
    proxy: "http://localhost/work"
  })
});


gulp.task('sass', function(){
  return gulp.src('./bulma/style.sass')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    // .pipe(sass({outputStyle: 'compressed'}))
    .pipe(gulp.dest('build/css/'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('beautify', function() {
    return gulp.src('style.css')
        .pipe(cssbeautify())
        .pipe(gulp.dest(''));
});

gulp.task('purgecss', () => {
  return gulp.src('build/css/style.css')
      .pipe(purgecss({
          content: ["**/*.php"]
      }))
      .pipe(gulp.dest(''))
})


// compresses all js files
gulp.task('compress', function (cb) {
  pump([
        gulp.src('./js-dev/*.js'),
        uglify(),
        gulp.dest('./js/')
    ],
    cb
  );
});

gulp.task('watch', ['browserSync', 'sass', 'compress', 'purgecss'], function(){
  gulp.watch('./bulma/style.sass', ['sass']);
  gulp.watch('./**/*.php', browserSync.reload);
  gulp.watch('./elements/**/*.php', browserSync.reload);
  gulp.watch('./js/**/*.js', browserSync.reload);
  gulp.watch('*.css', ['beautify']);
  // gulp.watch('*.css', browserSync.reload);
  gulp.watch('./js-dev/*.js', ['compress']);
  // Other watchers
})
