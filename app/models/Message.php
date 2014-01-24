<?php


/**
 * Messages model
 */
class Message extends Eloquent {

	// Table name
	protected $table = 'messages';

	// Fillable
	protected $fillable = array( 'author_name', 'message' );
}

?>