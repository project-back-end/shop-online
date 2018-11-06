<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('cat_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedInteger('st_id')->nullable();
            $table->foreign('st_id')->references('id')->on('stores')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->text('description')->nullable();

            $table->string('type')->nullable();
            $table->string('code')->nullable();
            $table->string('printable')->nullable();
            $table->string('url')->nullable();
            $table->date('end_date')->format('d-m-Y')->nullable();
            $table->date('start_date')->format('d-m-Y')->nullable();
            $table->boolean('exclusive_coupon')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('products');
    }
}
