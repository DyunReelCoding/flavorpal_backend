<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserPreference', function (Blueprint $table) {
            $table->id('preference_id'); // Auto-incremental primary key
            $table->unsignedBigInteger('user_id');
            $table->string('preference_type');
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign key constraint
            $table->foreign('user_id')->references('user_id')->on('logins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserPreference');
    }
}
