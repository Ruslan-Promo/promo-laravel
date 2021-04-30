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
            $table->foreignId('customer_id')->comment('Покупатель')->constrained('users')->onDelete('cascade');
            $table->foreignId('agent_id')->comment('Агент')->constrained('agents')->onDelete('cascade');
            $table->foreignId('request_id')->comment('Заявка на продукт')->constrained('product_requests')->onDelete('cascade');
            $table->float('total')->nullable()->comment('Стоимость');
            $table->timestamp('date_registration')->nullable()->comment('Дата оформления');
            $table->timestamp('date_start')->nullable()->comment('Дата начала действия');
            $table->timestamp('date_end')->nullable()->comment('Дата окончания действия');
            $table->timestamp('date_payment')->nullable()->comment('Дата оплаты');
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
