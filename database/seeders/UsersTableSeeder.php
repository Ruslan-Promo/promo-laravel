<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'surname' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'role' => User::ROLE_ADMIN,
            'email_verified_at' => now(),
            'password' => Hash::make('admin123456'),
            'status' => User::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //INSERT INTO `users`(`id`, `surname`, `name`, `email`, `role`, `password`) VALUES ('1','admin','admin','admin@admin.ru','admin','admin123')
    }
}
