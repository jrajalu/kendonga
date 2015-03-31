'use strict';
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // grunt-contrib-copy
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'bower_components/flexslider',
          src: 'flexslider.css',
          dest: 'css'
        },
        {
          expand: true,
          cwd: 'bower_components/flexslider/fonts',
          src: '*',
          dest: 'fonts'
        },
        {
          expand: true,
          cwd: 'bower_components/font-awesome/fonts',
          src: '*',
          dest: 'fonts'
        },
        {
          expand: true,
          cwd: 'bower_components/normalize.css',
          src: 'normalize.css',
          dest: 'css'
        }]
      }
    },
    // grunt-contrib-compass
    compass: {
      dist: { 
        options: { 
          sassDir: 'sass',
          cssDir: 'css',
          environment: 'production',
          outputStyle: 'expanded'
        }
      }
    },
    // grunt-contrib-concat
    concat: {
      basic: {
        src: ['bower_components/flexslider/jquery.flexslider.js'],
        dest: 'js/library.all.js',
      }
    },
    // grunt-contrib-uglify
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> v<%= pkg.version %> by <%= pkg.author %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        sourceMap: false
      },
      jquery: {
        src: 'bower_components/jquery/dist/jquery.js',
        dest: 'js/jquery.min.js'
      },
      library: {
        src: 'js/library.all.js',
        dest: 'js/library.all.min.js'
      },
      ukmtheme: {
        src: 'js/scripts.js',
        dest: 'js/scripts.min.js'
      }
    },
    // grunt-css-url-rewrite
    cssUrlRewrite: {
      dist: {
        src: 'bower_components/font-awesome/css/font-awesome.css',
        dest: 'css/font-awesome.css',
        options: {
          skipExternal: true,
          rewriteUrl: function(url, options, dataURI) {
            var path = url.replace(options.baseDir, '');
            return path;
          }
        }
      }
    },
    // grunt-contrib-cssmin
    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'style.css': ['css/version.css', 'css/normalize.css','css/flexslider.css', 'css/font-awesome.css', 'css/main.css']
        }
      }
    },
    // grunt-contrib-watch
    watch: {
      configFiles: {
        files: ['Gruntfile.js', 'bower.js', 'version.json']
      },
      css: {
        files: [
          'sass/main.scss',
          'sass/*.scss',
          'css/*.css'
        ],
        tasks: ['compass','cssmin'],
          options: {
            livereload: true
          }
      },
      js: {
        files: ['js/scripts.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    }
  });

  // load grunt task
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-css-url-rewrite');

  // execute grunt task
  
  grunt.registerTask('compile', ['copy', 'concat', 'cssUrlRewrite', 'compass', 'uglify', 'cssmin']);

  grunt.registerTask('dev', ['watch']);

};
