<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('company_id')->nullable()->comment('Компания')->constrained('companies');
            $table->string('specialty')->nullable()->comment('Должность');
            $table->foreignId('photo_id')->nullable()->comment('Фото')->constrained('media')->onDelete('cascade');

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
        Schema::dropIfExists('agents');
    }
}
