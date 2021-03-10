<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name'); /* название */
            $table->text('description')->nullable(); /* Описание */
            $table->string('logo')->nullable(); /* логотип */
            $table->text('images')->nullable(); /* изображения */
            $table->string('worktime')->nullable(); /* Время работы */
            $table->string('address')->nullable(); /* Адреса офисов */
            $table->string('inn')->nullable(); /* ИНН */
            $table->string('ogrn')->nullable(); /* ОГРН */
            $table->string('kpp')->nullable(); /* КПП */
            $table->string('fullname')->nullable(); /* полное наименование */
            $table->string('shortname')->nullable(); /* короткое наименование */
            $table->string('license')->nullable(); /* лицензия */
            $table->text('products')->nullable(); /* Продукты */
            $table->string('email')->unique();
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
        Schema::dropIfExists('agent_requests');
    }
}
