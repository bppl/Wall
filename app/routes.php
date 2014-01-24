<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
| Repository + postman
*/

Route::get('/', function()
{
	return View::make('hello');
});


/**
 * Save a message to the database
 *
 * <code>
 *
 * 		// POST    /messages
 * 		//
 * 		// To create a new message, just send a POST request to
 * 		// "http://localhost/Blues/messages" with the following data
 * 		//
 * 		// "author_name": 'Your author name'
 * 		// "message": 'Message content goes here'
 *
 *
 * <code>
 */
Route::post( '/messages', function() {

	// Get message data
	$text = Request::get( 'message' );
	$author_name = Request::get( 'author_name' );


	// Validation
	$v = Validator::make(
			Request::input()
		, 	array(
					'author_name' => 'required'
				,	'message' => 'required'
			)
	);

	// Does validation fail
	if ( $v->fails() )
		return Response::json(
			array( 'saved' => false )
		);


	// Save message
	$message = Message::create( array(
			'author_name' => $author_name
		,	'message' => $text
	) );

	return Response::json( array(
			'saved' => true
		,	'message' => $message->toArray()
	) );
});


/**
 * Return the list of all messages stored on the database
 *
 * <code>
 *
 * 		// GET    /messages
 * 		//
 * 		// To retrieve all the messages, just send a GET request to
 * 		// "http://localhost/wall/messages".
 * 		// The returned data will follow this format
 * 		//
 * 		// [
 * 		//   		{
 * 		//					"id": "1", "author_name": "John Doe", "message": "Sample message"
 * 		//				, 	"create_at": "2014-01-24 16:23:52", "updated_at": "2014-01-24 16:23:52"
 * 		//			}
 * 		//		,
 * 		//			{
 * 		//					"id": "1", "author_name": "John Doe", "message": "Sample message"
 * 		//				, 	"create_at": "2014-01-24 16:23:52", "updated_at": "2014-01-24 16:23:52"
 * 		//			}
 * 		//  ]
 *
 * <code>
 */
Route::get( '/messages', function() {

	$messages = Message::all();
	return Response::json( $messages->toArray() );

});