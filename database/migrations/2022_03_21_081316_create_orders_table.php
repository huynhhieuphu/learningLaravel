<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name', 80);
            $table->string('customer_address', 200);
            $table->string('customer_phone', 20);
            $table->string('customer_email', 100);
            $table->text('customer_note')->nullable();
            $table->integer('quantity')->unsigned();
            $table->tinyInteger('payment_type')->default(1);
            $table->boolean('status')->default(1);
            $table->string('code', 100)->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
