<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call( 'MessageTableSeeder' );
	}

}

/**
* Seeder
*/
class Mess extends AnotherClass
{

	function __construct(argument)
	{
		# code...
	}
}