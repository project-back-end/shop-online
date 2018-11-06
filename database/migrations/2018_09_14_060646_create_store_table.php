<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique()->nullable();;
            $table->string('slug')->nullable();;

            $table->text('description')->nullable();
            $table->string('home_url')->nullable();
            $table->string('image')->nullable();
            $table->boolean('feature_store')->nullable();

            $table->string('street')->nullable();
            $table->string('village')->nullable();
            $table->string('sangkat')->nullable();
            $table->string('city')->nullable();
            $table->string('capital')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('url_linked')->nullable();
            $table->string('url_website')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('store');
    }
}
