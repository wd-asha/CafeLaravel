<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('user_name')->nullable();
            $table->string('order_delivery')->nullable();
            $table->string('order_email')->nullable();
            $table->string('order_phone')->nullable();
            $table->integer('order_status')->default(0);
            $table->string('order_total')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
};
