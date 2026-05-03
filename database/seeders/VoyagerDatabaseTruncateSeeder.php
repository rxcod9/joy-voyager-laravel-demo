<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Facades\Voyager;

class VoyagerDatabaseTruncateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('voyager.truncate') !== true) {
            return;
        }

        Schema::disableForeignKeyConstraints();
        Voyager::model('DataType')->truncate();
        Voyager::model('DataRow')->truncate();
        Voyager::model('Menu')->truncate();
        Voyager::model('MenuItem')->truncate();
        // Voyager::model('Role')->truncate();
        // Voyager::model('Permission')->truncate();
        // Voyager::model('Setting')->truncate();
        // Voyager::model('UserSetting')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
