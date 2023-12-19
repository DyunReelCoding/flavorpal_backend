<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ratings', function (Blueprint $table) {
            $table->id('rating_id'); // Auto-incremental primary key
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id');
            $table->integer('score');
            $table->text('review')->nullable();
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('logins')->onDelete('cascade');
            $table->foreign('recipe_id')->references('recipe_id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ratings');
    }
}
