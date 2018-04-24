const gulp         = require('gulp');
const sass         = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', () => {
	return gulp.src('./sass\/**\/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(gulp.dest('./'))
})

gulp.task('watch', () => {
	gulp.watch('./sass\/**\/*.scss', ['sass'])
})

gulp.task('default', ['sass', 'watch']);