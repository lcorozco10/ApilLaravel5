<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usersi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usersi', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('user_name',50)->unique();
            $table->string('password',60);
            $table->string('first_name',50);
            $table->string('last_name')->nullable();
            $table->string('email',30)->unique();
            $table->string('identification',30)->unique();
            $table->string('image_uri');
            $table->text('description')->nullable();
            $table->enum('roll', ['admin', 'seller']);
            $table->softDeletes();
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
		Schema::drop('usersi');
	}

}
