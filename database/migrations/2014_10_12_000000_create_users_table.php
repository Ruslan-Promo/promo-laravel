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
			$table->string('surname')->comment('Фамилия');
            $table->string('name')->comment('Имя');
			$table->string('patronymic')->nullable()->comment('Отчество');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('role')->default(User::ROLE_DEFAULT)->comment('Роль');
            $table->string('gender')->nullable()->comment('Пол');
            $table->timestamp('email_verified_at')->nullable()->comment('Дата верификации');
            $table->string('password');
            $table->rememberToken();
            $table->string('status')->default(User::STATUS_INACTIVE)->comment('Статус пользователя');
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
