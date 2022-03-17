<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadSample\Database\Seeders\VoyagerDatabaseSeeder as SeedersVoyagerDatabaseSeeder;
use Joy\VoyagerUserSettings\Database\Seeders\UserSettingsTableSeeder;
use Joy\VoyagerUserSettings\Database\Seeders\UserSettingsPermissionsTableSeeder;

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
            \Joy\VoyagerCrm\Database\Seeders\MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,
            UserSettingsPermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UserSettingsTableSeeder::class,
            SeedersVoyagerDatabaseSeeder::class,
            \Joy\VoyagerCrm\Database\Seeders\VoyagerDatabaseSeeder::class,
        ]);
    }
}
