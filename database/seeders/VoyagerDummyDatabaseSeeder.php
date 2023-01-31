<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoyagerDummyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            PagesTableSeeder::class,
            TranslationsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            \Joy\VoyagerBreadSample\Database\Seeders\VoyagerDummyDatabaseSeeder::class,
            \Joy\VoyagerBreadNotification\Database\Seeders\VoyagerDummyDatabaseSeeder::class,
            \Joy\VoyagerDataSettings\Database\Seeders\VoyagerDummyDatabaseSeeder::class,
            \Joy\VoyagerDataTypeSettings\Database\Seeders\VoyagerDummyDatabaseSeeder::class,
        ]);
    }
}
