<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_profiles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name')->nullable();
            $table->mediumText('website')->nullable();
            $table->text('description')->nullable();
            $table->string('twitter')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('identification',30)->unique();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
		Schema::drop('users_profiles');
	}

}
