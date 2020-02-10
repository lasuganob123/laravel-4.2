<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeContentDatatypeToLongText extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::table('blogs',function($table){
		// 	$table->longText('content')->change();
		// });

		//Can't use the standard method for changing data type, there's an error (Duplicate column name...2)

		DB::statement('ALTER TABLE blogs MODIFY content LONGTEXT;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('blogs',function($table){
		// 	$table->string('content')->change();
		// });

		DB::statement('ALTER TABLE blogs MODIFY content TEXT;');
	}

}
