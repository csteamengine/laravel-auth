<?php

namespace Csteamengine\LaravelAuth\Seeds;

use Csteamengine\LaravelAuth\Seeds\Auth\PermissionRoleTableSeeder;
use Csteamengine\LaravelAuth\Seeds\Auth\UserRoleTableSeeder;
use Csteamengine\LaravelAuth\Seeds\Auth\UserTableSeeder;
use Csteamengine\LaravelAuth\Seeds\Traits\DisableForeignKeys;
use Csteamengine\LaravelAuth\Seeds\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class AuthTableSeeder.
 */
class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            config('auth.table_names.users'),
            config('auth.table_names.password_histories'),
            'password_resets',
            'social_accounts',
        ]);

        $this->call([
            UserTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UserRoleTableSeeder::class
        ]);

        $this->enableForeignKeys();
    }
}
