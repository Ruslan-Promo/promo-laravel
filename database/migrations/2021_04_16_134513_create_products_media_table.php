<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id')->comment('Медиа');
            $table->unsignedBigInteger('product_id')->comment('Продукт');
            $table->timestamps();
        });

        Schema::table('media', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_media');
    }
}
