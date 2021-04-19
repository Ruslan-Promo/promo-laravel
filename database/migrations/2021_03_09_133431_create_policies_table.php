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
            $table->unsignedBigInteger('agent_id')->comment('кто выдал');
            $table->unsignedBigInteger('company_id')->default(0)->comment('Компания');
            $table->float('price')->nullable()->comment('стоимость');
            $table->unsignedBigInteger('product_id')->comment('страховой продукт');
            $table->float('total')->nullable()->comment('Сумма страховки');
            $table->timestamp('date_start')->nullable()->comment('дата начала действия');
            $table->timestamp('date_end')->nullable()->comment('дата окончания действия');
            $table->text('description')->nullable()->comment('Описание объекта страхования');
            $table->timestamps();
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->foreignId('agent_id')->constrained();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained();
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
        Schema::dropIfExists('policies');
    }
}
