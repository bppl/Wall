<?php

use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'messages', function( $table ) {

			// Auto imcrement id ( Primary key )
			$table->increments( 'id' );
			$table->string( 'author_name' );
			$table->text( 'message' );
			$table->timestamps();


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'messages' );
	}

}