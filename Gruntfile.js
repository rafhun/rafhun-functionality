module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-pot');
  grunt.loadNpmTasks('grunt-po2mo');

  grunt.initConfig({
    pot: {
        options:{
        text_domain: 'rafhun-functionality', //Your text domain. Produces my-text-domain.pot
        dest: 'languages/', //directory to place the pot file
        keywords: [ //WordPress localisation functions
          '__:1',
          '_e:1',
          '_x:1,2c',
          'esc_html__:1',
          'esc_html_e:1',
          'esc_html_x:1,2c',
          'esc_attr__:1',
          'esc_attr_e:1',
          'esc_attr_x:1,2c',
          '_ex:1,2c',
          '_n:1,2',
          '_nx:1,2,4c',
          '_n_noop:1,2',
          '_nx_noop:1,2,3c'
        ],
        msgmerge: true
      },
      files:{
        src:  [ '**/*.php' ], //Parse all php files
        expand: true,
      }
    },
    po2mo: {
      files: {
        src: 'languages/*.po',
        expand: true
      },
    },
  });
};
