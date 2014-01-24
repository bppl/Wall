<?php
/**
 * Helper functions for
 */


/**
 * Return all the messages stored on the database
 *
 * <code>
 *
 * 		// Get all messages
 * 		$messages = get_all_messages();  ?>
 *
 * 		<?php foreach( $messages as $message ) : ?>
 *
 * 			<h4><?php echo $message->author_name; ?></h4>
 *
 * 		<?php endforeach; ?>
 *
 * </code>
 *
 * <code>
 *
 * 		// Sample data returned
 * 		array(
 * 				( object ) array(
 * 						'author_name' => 'John', 'message' => 'Sample message'
 * 					,	'created_at' => '2014-01-24 16:24:02', 'updated_at' => '2014-01-24 16:24:02'
 * 				)
 * 			,	( object ) array(
 * 						'author_name' => 'John', 'message' => 'Sample message'
 * 					,	'created_at' => '2014-01-24 16:24:02', 'updated_at' => '2014-01-24 16:24:02'
 * 				)
 * 		);
 *
 * </code>
 */
function get_all_messages( $url = 'http://localhost/Wall/public/messages' ) {

	return json_decode( file_get_contents( $url ) );
}

?>