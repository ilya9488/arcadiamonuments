const localUrl = "arcadiamemorial.com.loc";

const {src, dest, parallel, series, watch} = require('gulp');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const newer = require('gulp-newer');
const rigger = require('gulp-rigger');
const sourcemaps = require('gulp-sourcemaps');

function browsersync() {
  browserSync.init({
    proxy: localUrl,
    //server: {baseDir: 'app/'},
    // host: "192.168.0.103",
    notify: false,
    //port: 4200
  })
}

function styles() {
  return src('src/sass/style.sass')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(concat('style.min.css'))
    .pipe(autoprefixer({overrideBrowserslist:  ['last 10 versions'], grid: true}))
    .pipe(cleancss(({level: {1: {specialComments: 0}}})))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('static/css/'))
    .pipe(browserSync.stream());
}

function stylesHeader() {
  return src('src/sass/header.sass')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(concat('header.min.css'))
    .pipe(autoprefixer({overrideBrowserslist:  ['last 10 versions'], grid: true}))
    .pipe(cleancss(({level: {1: {specialComments: 0}}})))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('static/css/'))
    .pipe(browserSync.stream());
}

function cleanStyles() {
  return src('src/sass/all/all.sass')
    .pipe(sass())
    .pipe(cleancss(({level: {1: {specialComments: 0}}})))
    .pipe(dest('static/css/all/'));
}

function buildStyles() {
  const fs = require("fs");
  var data = fs.readFileSync("static/css/all/all.css");
  var dataArr = data.toString('utf8').split('.s21313{display:block}');
  console.log(dataArr[1]);

  fs.appendFile('static/css/all/header.css', dataArr[0], (err) => {
    if(err) throw err;
    console.log('Data has been added!');
  });
  fs.appendFile('static/css/all/main.css', dataArr[1], (err) => {
    if(err) throw err;
    console.log('Data has been added!');
  });
}

function scripts() {
  return src('src/js/common.js')
    .pipe(rigger())
    .pipe(concat('common.min.js'))
    .pipe(uglify())
    .pipe(dest('static/js/'))
    .pipe(browserSync.stream());

    // .pipe(concat('all.min.js'))
    // .pipe(uglify())
    //.pipe(dest('../../js/'))
    //.pipe(browserSync.stream());
}

function scriptsLibs() {
  return src([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    'node_modules/odometer/odometer.min.js',
    'node_modules/slick-carousel/slick/slick.min.js',
  ])
    .pipe(concat('all.min.js'))
    .pipe(uglify())
    .pipe(dest('../../js/'))
    .pipe(browserSync.stream());
}

function images(){
  return src('src/img/**/*')
    .pipe(newer('static/img/'))
    .pipe(imagemin())
    .pipe(dest('static/img/'));
}

const phpFiles = [
  '*.php',
  'acf-layouts/*.php',
  'acf-layouts/personal-area/*.php',
  'template-page/*.php',
  'template-parts/*.php',
  'inc/*.php',
]

function startwatch(){
  watch(['src/sass/**/*.(sass|scss)'], parallel(styles));
  watch(['src/sass/**/*.(sass|scss)'], parallel(stylesHeader));
  watch(['src/js/**/*.js'], parallel(scripts));
  watch(phpFiles).on('change', browserSync.reload);
  watch('src/img/**/*', parallel(images));
}

exports.browsersync = browsersync;
exports.scripts = scripts;
exports.styles = styles;
exports.stylesHeader = stylesHeader;
exports.scripts = scripts;
exports.images = images;

exports.buildStyles = buildStyles;
exports.cleanStyles = cleanStyles;

exports.default = parallel(browsersync, scripts, images, startwatch);
