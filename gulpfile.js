var gulp = require('gulp');
var wpPot = require('gulp-wp-pot');
var sort = require('gulp-sort');
var gettext = require('gulp-gettext');

gulp.task('pot', function () {
  return gulp.src('*.php')
    .pipe(sort())
    .pipe(wpPot( {
      domain: 'rafhun-functionality',
      destFile:'rafhun-functionality.pot',
      package: 'rafhun-functionality',
      // bugReport: 'http://example.com',
      lastTranslator: 'Raphael Hüni <hueni@werbelinie.ch>',
      team: 'Werbelinie AG <support@werbelinie.ch>'
    }
  ))
  .pipe(gulp.dest('languages'));
});

gulp.task('gettext', function() {
  gulp.src('languages/**/*.po')
    .pipe(gettext())
    .pipe(gulp.dest('languages'))
  ;
});
