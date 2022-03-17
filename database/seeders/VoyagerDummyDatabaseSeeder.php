<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadSample\Database\Seeders\VoyagerDummyDatabaseSeeder as SeedersVoyagerDummyDatabaseSeeder;

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
            SeedersVoyagerDummyDatabaseSeeder::class,
            \Joy\VoyagerCrm\Database\Seeders\VoyagerDummyDatabaseSeeder::class,
        ]);
    }
}
