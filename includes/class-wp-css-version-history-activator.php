<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.briscoweb.com/
 * @since      1.0.0
 *
 * @package    Wp_Css_Version_History
 * @subpackage Wp_Css_Version_History/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Css_Version_History
 * @subpackage Wp_Css_Version_History/includes
 * @author     Brian Holzberger <bkeith@briscoweb.com>
 */
class Wp_Css_Version_History_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
  /////////// if page doesnt exist
if( get_page_by_title('WP-CSS-Version-History') == NULL ){
    // Create post/page object
    
    $bwmy_new_page_la = array(
        'post_title' => 'WP-CSS-Version-History',
        'post_content' => '',
        'post_status' => 'private',
        'post_type' 	=> 'page',
        'post_author' => 1,
        'comment_status' => 'closed',
	'ping_status' => 'closed',
        'menu_order' => 0
    );

    // Insert the post into the database
    $bwmy_new_page_la_insert = wp_insert_post( $bwmy_new_page_la );


}
   
          
	}

}
