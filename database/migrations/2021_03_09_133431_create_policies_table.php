<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id'); /* кто выдал */
            $table->bigInteger('company_id')->default(0); /* Компания */
            $table->float('price')->nullable(); /* стоимость */
            $table->bigInteger('product_id'); /* страховой продукт */
            $table->float('total')->nullable(); /* Сумма страховки */
            $table->timestamp('date_start')->nullable(); /* дата начала действия */
            $table->timestamp('date_end')->nullable(); /* дата окончания действия */
            $table->text('description')->nullable(); /* Описание объекта страхования */
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
        Schema::dropIfExists('policies');
    }
}
