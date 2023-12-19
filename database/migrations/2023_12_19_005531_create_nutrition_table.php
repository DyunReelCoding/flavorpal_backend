<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nutrition', function (Blueprint $table) {
            $table->id('nutrition_id');
            $table->unsignedBigInteger('recipe_id');
            $table->decimal('calories', 10, 2);
            $table->decimal('protein', 10, 2);
            $table->decimal('carbohydrates', 10, 2);
            $table->decimal('fat', 10, 2);
            $table->decimal('fiber', 10, 2);
            $table->timestamps();

            $table->foreign('recipe_id')->references('recipe_id')->on('recipes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nutrition');
    }
};
