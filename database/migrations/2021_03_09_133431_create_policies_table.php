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
            $table->foreignId('agent_id')->comment('кто выдал')->constrained('agents')->onDelete('cascade');
            $table->foreignId('company_id')->nullable()->comment('Компания')->constrained('companies')->onDelete('set null');
            $table->float('price')->nullable()->comment('стоимость');
            $table->foreignId('product_id')->comment('страховой продукт')->constrained('products')->onDelete('cascade');
            $table->float('total')->nullable()->comment('Сумма страховки');
            $table->timestamp('date_start')->nullable()->comment('дата начала действия');
            $table->timestamp('date_end')->nullable()->comment('дата окончания действия');
            $table->text('description')->nullable()->comment('Описание объекта страхования');
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
