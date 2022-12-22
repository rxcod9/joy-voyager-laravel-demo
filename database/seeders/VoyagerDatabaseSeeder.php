<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoyagerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DataTypesTableSeeder::class,
            DataRowsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            // \Joy\VoyagerCrm\Database\Seeders\MenuItemsTableSeeder::class,
            \Joy\VoyagerBreadNotification\Database\Seeders\MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,
            \Joy\VoyagerUserSettings\Database\Seeders\UserSettingsPermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            \Joy\VoyagerUserSettings\Database\Seeders\UserSettingsTableSeeder::class,
            \Joy\VoyagerBreadSample\Database\Seeders\VoyagerDatabaseSeeder::class,
            \Joy\VoyagerBreadNotification\Database\Seeders\VoyagerDatabaseSeeder::class,
            // \Joy\VoyagerCrm\Database\Seeders\VoyagerDatabaseSeeder::class,
            \Joy\VoyagerDataSettings\Database\Seeders\VoyagerDatabaseSeeder::class,
            \Joy\VoyagerDataTypeSettings\Database\Seeders\VoyagerDatabaseSeeder::class,
        ]);
    }
}
