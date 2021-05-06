<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;
use App\Models\Agent;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);

        $role_admin = Role::create(['name' => User::ROLE_ADMIN]);

        $role_agent = Role::create(['name' => User::ROLE_AGENT]);
        $role_agent->givePermissionTo('create product');
        $role_agent->givePermissionTo('edit product');
        $role_agent->givePermissionTo('delete product');

        $role_user = Role::create(['name' => User::ROLE_DEFAULT]);

        $admin = User::factory()->create([
            'id' => 1,
            'surname' => 'Admin',
            'name' => 'Admin',
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_ACTIVE,
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole($role_admin);

        $agent = User::factory()->create([
            'id' => 2,
            'surname' => 'Agent',
            'name' => 'Agent',
            'role' => User::ROLE_AGENT,
            'status' => User::STATUS_ACTIVE,
            'email' => 'agent@agent.ru',
            'password' => Hash::make('agent123'),
        ]);

        Agent::create([
            'user_id' => $agent->id,
        ]);
        $agent->assignRole($role_agent);

        $user = User::factory()->create([
            'id' => 3,
            'surname' => 'User',
            'name' => 'User',
            'role' => User::ROLE_DEFAULT,
            'status' => User::STATUS_ACTIVE,
            'email' => 'user@user.ru',
            'password' => Hash::make('user123'),
        ]);
        $user->assignRole($role_user);
    }
}
