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
            $table->foreignId('media_id')->comment('Медиа')->constrained('media')->onDelete('cascade');
            $table->foreignId('requests_id')->comment('Заявки агента')->constrained('agent_requests')->onDelete('cascade');
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
        Schema::dropIfExists('agent_requests_media');
    }
}
