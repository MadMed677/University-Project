<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->increments('id');

            // Add 'category_id' constraint
            $table->integer('category_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->double('hours', 5);
            $table->timestamps();
        });

        Schema::table('user_activities', function(Blueprint $table) {
            // Add 'category_id' to constraint
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            // Add 'location_id' constraint
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            // Add 'user_id' constraint
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_activities');
    }
}
