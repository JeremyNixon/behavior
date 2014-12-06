<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		//
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('remember_token');	
			$table->timestamps();
		});

		Schema::create('books', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('author');
			$table->text('content');
			$table->timestamps();

		});

		Schema::create('posts', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
			$table->text('content');
			$table->timestamps();

		});


		Schema::create('comments', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
			$table->text('content');
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
		//
		Schema::table('posts', function($table) {
			$table->dropForeign('posts_user_id_foreign'); # table_fields_foreign
		});

		Schema::table('books', function($table) {
			$table->dropForeign('books_user_id_foreign'); # table_fields_foreign
		});


		Schema::table('comments', function($table) {
			$table->dropForeign('comments_user_id_foreign'); # table_fields_foreign
		});

		Schema::table('comments', function($table) {
			$table->dropForeign('comments_post_id_foreign'); # table_fields_foreign
		});

		//
		Schema::drop('comments');
		Schema::drop('posts');
		Schema::drop('users');
		Schema::drop('books');
	}

}
