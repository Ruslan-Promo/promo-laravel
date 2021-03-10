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
            $table->string('name'); /* название */
            $table->float('price_year'); /* стоимость за год */
            $table->text('description')->nullable(); /* описание */
            $table->bigInteger('agent_id')->default(0); /* агент */
            $table->text('advantages')->nullable(); /* Преимущества */
            $table->text('images')->nullable(); /* изображения */
            $table->float('price_six_month')->nullable(); /* стоимость за 6 месяцев */
            $table->float('price_one_month')->nullable(); /* стоимость за 1 месяц */
            $table->float('discount')->nullable(); /* скидка */
            $table->bigInteger('category_id')->default(0); /* Категория */
            $table->bigInteger('status')->default(0); /* Справочник статусов */
            $table->timestamp('expiration_date')->nullable();
            $table->text('options')->nullable(); /* опции */
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
