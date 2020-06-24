// Gulp.js configuration
'use strict';

const

  // Gulp and plugins
  { src,
    dest, 
    watch, 
    series, 
    parallel 
  }             = require('gulp'),
  imagemin      = require('gulp-imagemin'),
  autoprefixer  = require('autoprefixer'),
  concat        = require('gulp-concat'),
  cssnano       = require('cssnano'),
  sass          = require('gulp-sass'),
  sourcemaps    = require('gulp-sourcemaps'),
  postcss       = require('gulp-postcss'),
  gulpif        = require('gulp-if'),
  cleanCss      = require('gulp-clean-css'),
  yargs         = require('yargs'),
  del           = require('del'),
  webpack       = require('webpack-stream'),
  notify        = require('gulp-notify'),

  // source and build folders / file paths
  dir = {
    src         : 'src/', // Source file path
    build       : 'C:/xampp/htdocs/fritz.com.au/wp-content/themes/fritz/', // Build path
    localServer : 'localhost/fritz.com.au/' //Add your local server path here
  },

  php = {
    src           : dir.src + 'templates/**/*',
    watch         : dir.src + 'templates/**/**',
    build         : dir.build
  },

  images = {
    src         : dir.src + 'images/**/*',
    build       : dir.build + 'images/'
  },

  fonts = {
    src         : dir.src + 'fonts/**/*',
    build       : dir.build + 'fonts/'
  },

  css = {
    src         : dir.src + 'scss/bundle.scss',
    watch       : dir.src + 'scss/**/**',
    build       : dir.build + 'styles/'
  },
  
  js = {
    src         : dir.src + 'js/',
    build       : dir.build + 'js/',
    watch       : dir.src + 'js/**/**',
    filename    : 'bundle.js'
  }
;

const PRODUCTION = yargs.argv.prod;

// Use browser-sync for server & reloading
const server = require('browser-sync').create();
export const serve = done => {
  server.init({
    proxy   : dir.localServer,
    port    : 81,
    baseDir : dir.src,
    files   : ['*.php', '*.css', '**.*.js']
  });
  done();
};
export const reload = done => {
  server.reload();
  done();
};

// Clean dist folder
export const clean = () => {
  return del(dir.build, {force: true});
}

// Task to build css file as bundle.css
export const styles = () => {
  return src(css.src)
  .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
  .pipe(sass().on('error', sass.logError))
  .pipe(gulpif(PRODUCTION, postcss([ autoprefixer, cssnano ])))
  .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'*'})))
  .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
  .pipe(dest(css.build))
  /* .pipe(notify({
    message: "Styles updated",
    title: "Styles Completed"
  })) */
  .pipe(server.stream());
}

// Task to build js file as bundle.js
export const scripts = () => {
  return src([
    /* js.src + 'map.js', */
    js.src + 'bundle.js'
  ])
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        }
      ]
    },
    optimization:{
      namedChunks: true,
      minimize: true, 
      splitChunks: {
        cacheGroups: {
          commons: {
            test: /[\\/]node_modules[\\/]/,
            name: 'vendors',
            chunks: 'async'
          },
        }
      }
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: js.filename
    },
  }))
  .pipe(dest(js.build))
  /* .pipe(notify({
    message: "Scripts updated",
    title: "Scripts Completed"
  })) */;
}

export const minImages = () => {
  return src(images.src)
  .pipe(gulpif(PRODUCTION, imagemin( { optimizationLevel: 5 } )))
  .pipe(dest(images.build))
  /* .pipe(notify({
    message: "Image files updated",
    title: "Image Files moved over"
  })) */;
}

export const copyTemplates = () => {
  return src(php.src)
  .pipe(dest(dir.build))
  /* .pipe(notify({
    message: "Template files updated",
    title: "Template Files moved over"
  })) */;
}

export const copyFonts = () => {
  return src(fonts.src)
  .pipe(dest(fonts.build))
  /* .pipe(notify({
    message: "Font files updated",
    title: "Font Files moved over"
  })) */;
}

export const watchChanges = () => {
  watch(css.watch, styles);
  watch(images.src, series(minImages, reload));
  watch(php.watch, series(copyTemplates, reload));
  watch(fonts.src, series(copyFonts, reload));
  watch(js.watch, series(scripts, reload));
}

export const dev = series(clean, parallel(styles, minImages, copyTemplates, copyFonts, scripts), serve, watchChanges)
export const build = series(clean, parallel(styles, minImages, copyTemplates, copyFonts, scripts))
export default dev;