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
            $table->string('name')->comment('Название');
            $table->float('price_year')->nullable()->comment('Стоимость за год');
            $table->text('description')->nullable()->comment('Описание');
            $table->foreignId('agent_id')->nullable()->comment('Агент')->constrained('agents')->onDelete('cascade');
            $table->text('advantages')->nullable()->comment('Преимущества');
            $table->float('price_six_month')->nullable()->comment('Стоимость за 6 месяцев');
            $table->float('price_one_month')->nullable()->comment('Стоимость за 1 месяц');
            $table->float('discount')->nullable()->comment('Скидка');
            $table->foreignId('category_id')->nullable()->comment('Категория')->constrained('categories')->onDelete('set null');
            $table->foreignId('status_id')->nullable()->comment('Справочник статусов')->constrained('statuses_product')->onDelete('set null');
            $table->timestamp('expiration_date')->nullable()->comment('Дата окончания');
            $table->text('options')->nullable()->comment('Опции');
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
