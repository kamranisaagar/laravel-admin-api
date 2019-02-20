<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class CustomersSeeder extends Seeder
{

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create()
            ->each(function($user) {
                $user->assignRole('customer');
            });
    }
}
