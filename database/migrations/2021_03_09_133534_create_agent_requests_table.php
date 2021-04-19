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
            $table->string('name')->comment('название');
            $table->text('description')->nullable()->comment('Описание');
            $table->unsignedBigInteger('logo_id')->nullable()->comment('логотип');
            $table->string('worktime')->nullable()->comment('Время работы');
            $table->string('address')->nullable()->comment('Адреса офисов');
            $table->string('inn')->nullable()->comment('ИНН');
            $table->string('ogrn')->nullable()->comment('ОГРН');
            $table->string('kpp')->nullable()->comment('КПП');
            $table->string('fullname')->nullable()->comment('полное наименование');
            $table->string('shortname')->nullable()->comment('короткое наименование');
            $table->string('license')->nullable()->comment('лицензия');
            $table->text('products')->nullable()->comment('Продукты');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::table('media', function (Blueprint $table) {
            $table->foreignId('logo_id')->constrained();
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
