<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id')->comment('Медиа');
            $table->unsignedBigInteger('company_id')->comment('Компания');
            $table->timestamps();
        });
        Schema::table('media', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies_media');
    }
}
