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
            $table->unsignedBigInteger('customer_id')->comment('Покупатель');
            $table->unsignedBigInteger('agent_id')->comment('Агент');
            $table->unsignedBigInteger('request_id')->comment('Заявка на продукт');
            $table->float('total')->default(0)->comment('Стоимость');
            $table->timestamp('date_registration')->nullable()->comment('Дата оформления');
            $table->timestamp('date_start')->nullable()->comment('Дата начала действия');
            $table->timestamp('date_end')->nullable()->comment('Дата окончания действия');
            $table->timestamp('date_payment')->nullable()->comment('Дата оплаты');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('customer_id')->constrained();
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->foreignId('agent_id')->constrained();
        });

        Schema::table('product_requests', function (Blueprint $table) {
            $table->foreignId('request_id')->constrained();
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
