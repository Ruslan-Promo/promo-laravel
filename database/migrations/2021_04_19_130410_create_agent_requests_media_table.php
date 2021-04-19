<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentRequestsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_requests_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id')->comment('Медиа');
            $table->unsignedBigInteger('requests_id')->comment('Заявки агента');
            $table->timestamps();
        });

        Schema::table('media', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained();
        });

        Schema::table('agent_requests', function (Blueprint $table) {
            $table->foreignId('requests_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_requests_media');
    }
}
