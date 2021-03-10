<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->string('surname'); /* фамилия */
            $table->string('name'); /* имя */
			$table->string('patronymic')->nullable(); /* отчество */
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->bigInteger('role')->default(0); /* роль (справочник) */
            $table->string('gender')->nullable(); /* пол */
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->smallInteger('status')->default(User::STATUS_INACTIVE);
            $table->string('verify_token')->nullable()->unique();
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
        Schema::dropIfExists('users');
    }
}
