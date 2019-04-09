const gulp = require('gulp');
const sass = require('gulp-sass');
const cssnano = require('gulp-cssnano');
const autoprefixer = require('gulp-autoprefixer');

const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
const jshint = require('gulp-jshint');

const imagemin = require('gulp-imagemin');
const livereload = require('gulp-livereload');

// sass
gulp.task('sass', function(){
  return gulp.src('source/scss/*.scss')
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest('css'))
    .pipe(livereload());
});

// autoprefixer
gulp.task('prefix', function(){
  return gulp.src('public/css/style.css')
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest('css'))
    .pipe(livereload());
});

// gulp-cssnano
gulp.task('nano', ['prefix'], function() {
  return gulp.src('public/css/style.css')
    .pipe(cssnano())
    .pipe(gulp.dest('css/minified'))
    .pipe(livereload());
});

// uglify
gulp.task('compress', ['babel'], function () {
  return gulp.src('source/js/babel/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .on('error', function(err) {
      console.error('Error in compress task', err.toString());
    });
});

// gulp-concat
gulp.task('concat', ['compress'], function() {
  return gulp.src(['source/js/*.js', '!js/**/bundled.js'])
    .pipe(concat('bundled.js'))
    .pipe(gulp.dest('public/js/bundled'))
    .pipe(livereload());
});

// Babel
gulp.task('babel', ['lint'], function () {
  gulp.src('source/js/*.js')
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(gulp.dest('source/js/babel'))
});

// JSHint
gulp.task('lint', function() {
  return gulp.src('source/js/*.js')
    .pipe(jshint({
      esnext:true
    }))
    .pipe(jshint.reporter('default'));
});

// imagemin
gulp.task('imagemin', function () {
  gulp.src('public/images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('images'))
});


gulp.task('watch', ['sass'], function(){
  livereload.listen();
  gulp.watch(['source/scss/**/*.scss'], ['sass']);
  gulp.watch(['public/css/style.css'], ['nano']);
  gulp.watch(['source/js/*.js'], ['concat']);
})
