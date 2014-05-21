module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: {
                    '../assets/css/style.css': '../assets/css/style.scss'
                }
            }
        },
        uglify: {
            options: {
                compress: {
                    global_defs: {
                      "DEBUG": true
                    },
                    dead_code: true
                },
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: '../assets/js/src/<%= pkg.name %>.js',
                dest: '../assets/js/build/<%= pkg.name %>.min.js'
            }
        },
        watch: {
            grunt: { files: ['Gruntfile.js'] },

            sass: {
                files: '../assets/css/*.scss',
                tasks: ['sass']
            },
            options: { nospawn: true },
            scripts: {
                files: ['../assets/js/src/*.js'],
                tasks: ['uglify']
            }
        }
    });

    // Load the plugin that provides the tasks.
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task(s).
    grunt.registerTask('build', ['sass']);
    grunt.registerTask('default', ['uglify', 'watch']);

};