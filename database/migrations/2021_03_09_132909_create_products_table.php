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
            $table->float('price_year')->comment('Стоимость за год');
            $table->text('description')->nullable()->comment('Описание');
            $table->unsignedBigInteger('agent_id')->default(0)->comment('Агент');
            $table->text('advantages')->nullable()->comment('Преимущества');
            $table->float('price_six_month')->nullable()->comment('Стоимость за 6 месяцев');
            $table->float('price_one_month')->nullable()->comment('Стоимость за 1 месяц');
            $table->float('discount')->nullable()->comment('Скидка');
            $table->unsignedBigInteger('category_id')->default(0)->comment('Категория');
            $table->unsignedBigInteger('status_id')->default(0)->comment('Справочник статусов');
            $table->timestamp('expiration_date')->nullable()->comment('Дата окончания');
            $table->text('options')->nullable()->comment('Опции');
            $table->timestamps();
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->foreignId('agent_id')->constrained();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
        });

        Schema::table('statuses_product', function (Blueprint $table) {
            $table->foreignId('status_id')->constrained();
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
