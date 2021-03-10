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
            $table->id();
            $table->bigInteger('customer_id'); /* Покупатель */
            $table->bigInteger('agent_id'); /* Агент */
            $table->bigInteger('request_id'); /* Заявка на продукт */
            $table->float('total'); /* стоимость */
            $table->timestamp('date_registration')->nullable(); /* дата оформления */
            $table->timestamp('date_start')->nullable(); /* дата начала действия */
            $table->timestamp('date_end')->nullable(); /* дата окончания действия */
            $table->timestamp('date_payment')->nullable(); /* дата оплаты */
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
        Schema::dropIfExists('orders');
    }
}
