<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('recipe_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('logins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
