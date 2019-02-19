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
        $admin = Role::create(['name' => 'Administrator']);
        $moderator = Role::create(['name' => 'Moderator']);
        $customer = Role::create(['name' => 'Customer']);

        // Create Permissions
        Permission::create(['name' => 'access-customers']);
        Permission::create(['name' => 'access-sales']);
        Permission::create(['name' => 'access-reports']);

        $admin->syncPermissions(['access-reports', 'access-sales', 'access-reports']);
        $moderator->givePermissionTo(['access-sales', 'access-reports']);
        $customer->givePermissionTo(['access-reports']);

        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($moderator);
        User::find(3)->assignRole($customer);
    }
}
