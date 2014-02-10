module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
                files: 'public/sass/*.scss',
                tasks: ['compass'],
                options: {
                    livereload: true
                }
            },
            templates: {
                files: 'public/hogan/*.hogan',
                tasks: ['hogan'],
                options: {
                    livereload: true
                }
            }
        },
        compass: {
            dev: {
                options: {
                    sassDir: 'public/sass',
                    cssDir: 'public/css',
                    trace: true
                }
            }
        },
        copy: {
            components: {
                files: [
                    {
                        cwd: 'bower_components/foundation/js',
                        expand: true,
                        src: ['foundation.js'],
                        dest: 'public/js/lib/'
                    },
                    {
                        cwd: 'bower_components/jquery',
                        expand: true,
                        src: ['jquery.js'],
                        dest: 'public/js/lib/'
                    },
                    {
                        cwd: 'bower_components/requirejs',
                        expand: true,
                        src: ['require.js'],
                        dest: 'public/js/'
                    },
                    {
                        cwd: 'bower_components/modernizr',
                        expand: true,
                        src: ['modernizr.js'],
                        dest: 'public/js/lib/'
                    },
                    {
                        src: 'bower_components/hogan/web/builds/2.0.0/hogan-2.0.0.amd.js',
                        dest: 'public/js/lib/hogan.js'
                    },
                    {
                        cwd: 'bower_components/backbone',
                        expand: true,
                        src: ['backbone.js'],
                        dest: 'public/js/lib/'
                    },
                    {
                        src: 'bower_components/marionette/lib/backbone.marionette.js',
                        dest: 'public/js/lib/marionette.js'
                    },
                    {
                        cwd: 'bower_components/underscore',
                        expand: true,
                        src: ['underscore.js'],
                        dest: 'public/js/lib/'
                    }
                ]
            }
        },
        rsync: {
            options: {
                args: ['--progress'],
                exclude: ['.git*'],
                recursive: true,
                public: 'dist/',
                dest: '/home/cuentas/html/heineken_uefa',
                host: 'hidra.advante.cl',
                syncDestIgnoreExcl: true
            }
        },
        cssmin: {
            minify: {
                expand: true,
                cwd: 'public/css/',
                src: ['*.css', '!*.min.css'],
                dest: 'public/css',
                ext: '.min.css'
            }
        },
        hogan: {
            dev: {
                templates: 'public/hogan/**.hogan',
                output: 'public/js/templates.js',
                binderName: 'amd'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks("grunt-rsync");
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks("grunt-hogan");

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['compass', 'cssmin']);
    grunt.registerTask('deploy', ['build', 'rsync']);

};
