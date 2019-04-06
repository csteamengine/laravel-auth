<?php
namespace Csteamengine\LaravelAuth\Seeds\Auth;

use Csteamengine\LaravelAuth\Models\Auth\User;
use Csteamengine\LaravelAuth\Seeds\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        User::find(1)->assignRole(config('auth.users.admin_role'));
        User::find(2)->assignRole('executive');
        User::find(3)->assignRole(config('auth.users.default_role'));

        $this->enableForeignKeys();
    }
}
