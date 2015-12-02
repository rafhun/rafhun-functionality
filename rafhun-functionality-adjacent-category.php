<?php
/**
 * Plugin Name: rafhun-adjacent-category
 * Plugin URI: https://github.com/rafhun/rafhun-adjacent-category
 * Description: Makes it possible for you to navigate through taxonomy terms (the taxonomy can be chosen at will).
 * Version: 0.1.0
 * Author: rafhun
 * Author URI: https://github.com/rafhun
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: rafhun-adjacent-category
 * Domain Path: /languages
 *
 * Usage:
 * 	$ids = new rafhun_adjacent_category( 'category', 'name', true);
 * 	$href = get_term_link( $ids->previous( $some_category_id ) );
 */

class rafhun_adjacent_category {

  public $sorted_taxonomies;

  /**
   * @param string Taxonomy name. Defaults to 'category'.
   * @param string Sort key. Defaults to 'id'.
   * @param boolean Whether to show empty (no posts) taxonomies.
   */
  public function __construct( $taxonomy = 'category', $order_by = 'id', $skip_empty = true ) {

    $this->sorted_taxonomies = get_terms(
      $taxonomy,
      array(
        'get'          => $skip_empty ? '' : 'all',
        'fields'       => 'ids',
        'hierarchical' => false,
        'order'        => 'ASC',
        'orderby'      => $order_by,
      )
    );
  }

  /**
   * @param int Taxonomy ID.
   * @return int|bool Next taxonomy ID or false if this ID is last one. False if this ID is not in the list.
   */
  public function next( $taxonomy_id ) {

    $current_index = array_search( $taxonomy_id, $this->sorted_taxonomies );

    if ( false !== $current_index && isset( $this->sorted_taxonomies[ $current_index + 1 ] ) )
      return intval( $this->sorted_taxonomies[ $current_index + 1 ] );

    return false;
  }

  /**
   * @param int Taxonomy ID.
   * @return int|bool Previous taxonomy ID or false if this ID is last one. False if this ID is not in the list.
   */
  public function previous( $taxonomy_id ) {

    $current_index = array_search( $taxonomy_id, $this->sorted_taxonomies );

    if ( false !== $current_index && isset( $this->sorted_taxonomies[ $current_index - 1 ] ) )
      return intval( $this->sorted_taxonomies[ $current_index - 1 ] );

    return false;
  }
}
?>
