<?php
/**
 * Custom Post Type
 *
 * Creates a custom post type and a custom taxonomy assigned to it. If you do not need the taxonomy just comment out the action in the class constructor.
 *
 * @package rafhun
 * @since 0.1.0
 *
 * Usage: copy file and rename it to represent your custom post type. Then do a search and replace for PostTypes and give it the appropriate name (plural). After that search for PostType and replace it with the singular name of your custom post type. If you need/want to define multiple post types or taxonomies in the same file just add the relevant data to the class methods. To adjust the taxonomies search and replace Taxonomies first, then do the same for Taxonomy. Make sure you enable case sensitive search.
 *
 * At last look for the function `register_post_type( 'posttype', …)`. There replace posttype by the actual name you want to reference your custom post type with. Also check the options in the following array and adjust them to your needs.
 *
 * Once you are all set with your post type, determine the image sizes it demands. If any additional sizes need to be added do this here along with the post type registration within the class method `after_setup_theme`. Should you not need the example image size given comment it out or delete it completely.
 */

if ( !class_exists( 'PostType' ) ) :
  class PostType {
    public function __construct() {
      // registers the post type
      add_action( 'init', array( $this, 'register_post_type' ), 0 );
      // registers the custom taxonomy (comment out if not needed)
      add_action( 'init', array( $this, 'register_taxonomy' ), 0 );
      // includes configurations such as custom image sizes demanded by this post type
      add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
    }

    public function after_setup_theme() {
      // add your custom image sizes here
      add_image_size( 'PostTypes-header', 720, 350 );
    }

    public function register_post_type() {
      // first we define the labels
      $labels = array(
        'name' => _x( 'PostTypes', 'Post Type General Name', 'rafhun-functionality' ),
        'singular_name' => _x( 'PostType', 'Post Type Singular Name', 'rafhun-functionality' ),
        'menu_name' => _x( 'PostTypes', 'Post Type Menu Name', 'rafhun-functionality' ),
        'add_new' => _x( 'Add New', 'PostType Item', 'rafhun-functionality' ),
        'add_new_item' => __( 'Add New PostType', 'rafhun-functionality' ),
        'edit_item' => __( 'Edit PostType', 'rafhun-functionality' ),
        'new_item' => __( 'New PostType', 'rafhun-functionality' ),
        'view_item' => __( 'View PostType', 'rafhun-functionality' ),
        'search_items' => __( 'Search PostTypes', 'rafhun-functionality' ),
        'not_found' => __( 'No PostTypes Found', 'rafhun-functionality' ),
        'not_found_in_trash' => __( 'No PostTypes Found in Trash', 'rafhun-functionality' ),
        'parent_item_colon' => ''
      );

      register_post_type( 'posttype', array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-hammer',
        'rewrite' => array( 'slug' => 'posttype' ),
        'supports' => array( 'title', 'editor', 'thumbnail' )
      ) );
    }

    public function register_taxonomy() {
      $labels = array(
        'name' => _x( 'Taxonomies', 'taxonomy general name', 'rafhun-functionality' ),
        'singular_name' => _x( 'Taxonomy', 'taxonomy singular name', 'rafhun-functionality' ),
        'search_items' => __( 'Search Taxonomy', 'rafhun-functionality' ),
        'all_items' => __( 'All Taxonomies', 'rafhun-functionality' ),
        'parent_item' => __( 'Parent Taxonomy', 'rafhun-functionality' ),
        'parent_item_colon' => __( 'Parent Taxonomy:', 'rafhun-functionality' ),
        'edit_item' => __( 'Edit Taxonomy', 'rafhun-functionality' ),
        'update_item' => __( 'Update Taxonomy', 'rafhun-functionality' ),
        'add_new_item' => __( 'Add New Taxonomy', 'rafhun-functionality' ),
        'new_item_name' => __( 'New Taxonomy Name', 'rafhun-functionality' ),
      );

      // register and attach to 'references' post type
      register_taxonomy( 'taxonomy', 'posttype', array(
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'taxonomy' ),
        'labels' => $labels
      ) );
    }
  }

  $PostTypes = new PostType();

endif;
?>
