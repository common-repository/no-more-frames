<?php
/*
Plugin Name: No More Frames
Plugin URI:
Description: Forces frames to reload to the website homepage.
Author: Hors Hipsrectors
Version: 2017.08.13
Author URI:
*/

/**
 * No More Frames
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/no-more-frames/
 *
 * @package	No More Frames
 * @copyright	Copyright ( c ) 2010, Hors Hipsrectors
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 ( or newer )
 *
 * @since		No More Frames 1.0
 */




/* if the plugin is called directly, die */
if ( ! defined( 'WPINC' ) )
	die;


define( 'horshipsrectors_NMF_NAME', 'No More Frames' );
define( 'horshipsrectors_NMF_SHORTNAME', 'No More Frames' );

define( 'horshipsrectors_NMF_FILENAME', plugin_basename( __FILE__ ) );
define( 'horshipsrectors_NMF_FILEPATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'horshipsrectors_NMF_FILEPATHURL', plugin_dir_url( __FILE__ ) );

define( 'horshipsrectors_NMF_NAMESPACE', basename( horshipsrectors_NMF_FILENAME, '.php' ) );
define( 'horshipsrectors_NMF_TEXTDOMAIN', str_replace( '-', '_', horshipsrectors_NMF_NAMESPACE ) );

define( 'horshipsrectors_NMF_VERSION', '15.01' );

include_once( 'horshipsrectors-common.php' );



/**
 * Creates the class required for NMF Search for WordPress
 *
 * @author	Hors Hipsrectors <info@horshipsrectors.com>
 * @version	Release: @15.01@
 * @see		wp_enqueue_scripts()
 * @since	Class available since Release 15.01
 *
 */
if( ! class_exists( 'thissimyurl_NoMoreFrames' ) ) {
class thissimyurl_NoMoreFrames extends horshipsrectors_Common_NMF {

	/**
	* Standard Constructor
	*
	* @access public
	* @static
	* @uses http://codex.wordpress.org/Function_Reference/add_action
	* @since Method available since Release 15.01
	*
	*/
	public function run() {
		add_filter( 'wp_footer', array( $this, 'no_more_frames' ) );
	}


	/**
	* horshipsrectors_no_more_frames
	*
	* @access public
	* @static
	* @since Method available since Release 15.01
	*
	* @todo figure out how to call this dynamically from within an enqueue function
	*
	*/
	function no_more_frames() {

	?>
		<!-- No More Frames ( start ) -->
		<script type='text/javascript'>
		<!--
		try
		{
			var parent_location = new String( parent.location );
			var top_location = new String( top.location );
			var cur_location = new String( document.location );
			parent_location = parent_location.toLowerCase();
			top_location = top_location.toLowerCase();
			cur_location = cur_location.toLowerCase();

			if ( ( top_location != cur_location ) && parent_location.indexOf( '{<?php echo strtolower( get_site_url() ); ?>}' ) != 0 )
			{
				top.location.href = document.location.href;
			}
		}
		catch ( err )
		{top.location.href = document.location.href;}
		//-->
	</script>
	<!-- No More Frames ( end ) -->
	<?php

	}

}
}

$thissimyurl_NoMoreFrames = new thissimyurl_NoMoreFrames;

$thissimyurl_NoMoreFrames->run();