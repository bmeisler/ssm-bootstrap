'use strict';
 
module.exports = function (grunt) {
    // load all grunt tasks
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    
    grunt.initConfig({
        watch: {
            // if any .less file changes in directory "public/css/" run the "less"-task.
            files: "library/less/*.less",
            tasks: ["less", "cssmin"]
        },
        // "less"-task configuration
        less: {
            // production config is also available
            development: {
                options: {
                    // Specifies directories to scan for @import directives when parsing. 
                    // Default value is the directory of the source, which is probably what you want.
                    paths: ["library/less/"],
                    compress: true,
                    yuicompress: true
                },
                files: {
                    // compilation.css  :  source.less
                    "css/ssm.min.css": "library/less/style.less"
                }
            },
        },
        cssmin: {
            // target: {
            //     files: [{
            //         expand: true,
            //         cwd: 'css',
            //         src: ['*.css', '!*.min.css'],
            //         dest: 'css',
            //         ext: '.min.css'
            //     }]
            // },
            target: {
                files: {
                'css/output.min.css': ['style.css', 'css/bootstrap-social.min.css', 'css/bootstrap.min.css', 'css/ssm.min.css', 'css/font-awesome.min.css']
                }
            }
        }
    });
     // the default task (running "grunt" in console) is "watch"
     grunt.registerTask('default', ['watch']);
};

