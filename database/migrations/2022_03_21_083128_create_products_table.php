<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 120);
            $table->string('image', 200);
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->tinyInteger('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->tinyInteger('sale_off')->unsigned()->default(0);
            $table->string('code', 100)->nullable();
            $table->integer('count_view')->unsigned()->default(1);
            $table->boolean('status')->default(1);
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
