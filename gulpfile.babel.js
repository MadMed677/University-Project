import gulp             from 'gulp';
import concat           from 'gulp-concat';
import order            from 'gulp-order';
import stylus           from 'gulp-stylus';

const srcDir            = `src`;
const publicDir         = `public`;

gulp.task('vendor-js', () => {
    gulp.src(`src/js/vendor/*.js`)
        .pipe( order([
            'src/js/vendor/_jquery.min.js',
            'src/js/vendor/moment.js',
            'src/js/vendor/adminLTE.js',
            'src/js/vendor/daterangepicker.js',
            'src/js/vendor/*.js'
        ]) )
        .pipe( concat('vendor.js') )
        .pipe( gulp.dest(`public/js`) );
});

gulp.task('stylus', () => {
    gulp.src(`src/css/*.styl`)
        .pipe( stylus() )
        .pipe( gulp.dest('public/css') );
});

gulp.task('watch', () => {
    gulp.watch('src/js/vendor/**/*.js', ['vendor-js']);
    gulp.watch('src/css/**/*.styl', ['stylus']);
});

gulp.task('default', ['vendor-js', 'stylus', 'watch']);