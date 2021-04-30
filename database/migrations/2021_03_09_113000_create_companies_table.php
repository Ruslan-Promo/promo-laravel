<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->text('description')->nullable()->comment('Описание');
            $table->string('worktime')->nullable()->comment('Время работы');
            $table->string('address')->nullable()->comment('Адреса офисов');
            $table->string('inn')->nullable()->comment('ИНН');
            $table->string('ogrn')->nullable()->comment('ОГРН');
            $table->string('kpp')->nullable()->comment('КПП');
            $table->string('fullname')->nullable()->comment('полное наименование');
            $table->string('shortname')->nullable()->comment('короткое наименование');
            $table->string('license')->nullable()->comment('лицензия');
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
        Schema::dropIfExists('companies');
    }
}
