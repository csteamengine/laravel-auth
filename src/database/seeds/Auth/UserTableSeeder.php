<?php
namespace Csteamengine\LaravelAuth\Seeds\Auth;

use Csteamengine\LaravelAuth\Models\Auth\User;
use Csteamengine\LaravelAuth\Seeds\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
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

        // Add the master administrator, user id of 1
        User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Istrator',
            'email'             => 'admin@admin.com',
            'password'          => 'secret',
            'stripe_id'         => 'test',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]);

        User::create([
            'first_name'        => 'Backend',
            'last_name'         => 'User',
            'email'             => 'executive@executive.com',
            'password'          => 'secret',
            'stripe_id'         => 'test',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]);

        User::create([
            'first_name'        => 'Default',
            'last_name'         => 'User',
            'email'             => 'user@user.com',
            'password'          => 'secret',
            'stripe_id'         => 'test',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]);

        $this->enableForeignKeys();
    }
}
