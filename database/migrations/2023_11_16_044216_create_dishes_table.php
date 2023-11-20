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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->boolean('status')->default(true);
            $table->string('image')->default('media/dish/empty-image.png');
            $table->tinyText('compound');
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
        Schema::dropIfExists('dishes');
    }
};
