'use strict';
module.exports = function(grunt) {

  // Project configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // grunt-contrib-copy
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'bower_components/owlcarousel/owl-carousel',
          src: '*.css',
          dest: 'img'
        },
        {
          expand: true,
          cwd: 'bower_components/owlcarousel/owl-carousel',
          src: 'AjaxLoader.gif',
          dest: 'img'
        },
        {
          expand: true,
          cwd: 'bower_components/owlcarousel/owl-carousel',
          src: 'grabbing.png',
          dest: 'img'
        },
        {
          expand: true,
          cwd: 'bower_components/uikit/css',
          src: 'uikit.almost-flat.css',
          dest: 'css'
        },
        {
          expand: true,
          cwd: 'bower_components/uikit/fonts',
          src: '*',
          dest: 'fonts'   
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
        src: ['bower_components/uikit/js/uikit.js', 'bower_components/owlcarousel/owl-carousel/owl.carousel.js'],
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
      uikit: {
        src: 'css/uikit.almost-flat.css',
        dest: 'css/uikit.almost-flat-rewrite.css',
        options: {
          skipExternal: true,
          rewriteUrl: function(url, options, dataURI) {
            var path = url.replace(options.baseDir, '');
            return path;
          }
        }
      },
      owl_carousel: {
        src: ['img/owl.carousel.css'],
        dest: 'css/owl.carousel-rewrite.css',
        options: {
          skipExternal: true,
          rewriteUrl: function(url, options, dataURI) {
            var path = url.replace(options.baseDir, '');
            return path;
          }
        }
      },
      owl_theme: {
        src: ['img/owl.theme.css'],
        dest: 'css/owl.theme-rewrite.css',
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
        roundingPrecision: -1,
        keepSpecialComments: 0
      },
      target: {
        files: {
          'style.css': ['css/uikit.almost-flat-rewrite.css', 'css/owl.carousel-rewrite.css', 'css/owl.theme-rewrite.css', 'css/main.css']
        }
      }
    },
    // grunt-banner
    usebanner: {
      taskName: {
        options: {
          position: 'top',
          banner: '/*\n'+
                  'Theme Name: <%= pkg.name %>\n'+
                  'Version: <%= pkg.version %>\n'+
                  'Description: <%= pkg.description %>\n'+
                  'Author: <%= pkg.author %>\n'+
                  '*/',
          linebreak: true
        },
        files: {
          src: [ 'style.css' ]
        }
      }
    },
    // grunt-contrib-clean
    clean: {
      js: ['js/*.js', '!js/*.min.js'],
      css: ['img/*.css', 'css/*.css', '!css/*.min.css']
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
        tasks: ['compass','cssmin','usebanner'],
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
    // end Project configuration
  });

  // load grunt task
  
  grunt.loadNpmTasks('grunt-banner');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-css-url-rewrite');

  // execute grunt task
  
  grunt.registerTask('build', ['copy', 'concat', 'cssUrlRewrite', 'compass', 'uglify', 'cssmin', 'usebanner']);

  grunt.registerTask('dev', ['watch']);

  grunt.registerTask('final', ['clean']);

};
