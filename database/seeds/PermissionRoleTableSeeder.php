<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $admin = Role::create(['name' => 'administrator']);
        $moderator = Role::create(['name' => 'moderator']);
        $customer = Role::create(['name' => 'customer']);

        // Create Permissions
        Permission::create(['name' => 'access-customers']);
        Permission::create(['name' => 'access-sales']);
        Permission::create(['name' => 'access-reports']);

        $admin->syncPermissions(['access-customers', 'access-sales', 'access-reports']);
        $moderator->givePermissionTo(['access-sales', 'access-reports']);
        $customer->givePermissionTo(['access-reports']);

        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($moderator);
        User::find(3)->assignRole($customer);
    }
}
