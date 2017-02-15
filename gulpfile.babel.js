import gulp from 'gulp';
import sass from 'gulp-sass';
import babel from 'gulp-babel';
import uglify from 'gulp-uglify';
import browserSync from 'browser-sync';
import autoprefixer from 'gulp-autoprefixer';

gulp.task('browser-sync', () => {
  browserSync.init({
    proxy: "localhost:8080"
  });
});

gulp.task('styles', () => {
  return gulp.src('resources/sass/*.scss')
  .pipe(sass.sync().on('error', sass.logError))
  .pipe(autoprefixer({
    browsers: ['last 2 versions'],
    cascade: false
  }))
  .pipe(gulp.dest('public/styles'))
  .pipe(browserSync.stream());
});

gulp.task('scripts', () => {
  return gulp.src('resources/js/main.js')
  .pipe(babel({
    presets: ['es2015']
  }))
  .pipe(uglify())
  .pipe(gulp.dest('public/scripts'));
});

gulp.task('default', ['browser-sync', 'styles', 'scripts'], () => {
  gulp.watch('resources/styles/**/*.scss', ['styles']);
  gulp.watch('resources/scripts/**/*.js').on('change', browserSync.reload);
  gulp.watch('resources/templates/**/*.html').on('change', browserSync.reload);
});
