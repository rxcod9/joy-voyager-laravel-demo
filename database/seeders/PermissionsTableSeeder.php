<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Voyager::model('Permission')->firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Voyager::model('Permission')->generateFor('menus');

        Voyager::model('Permission')->generateFor('roles');

        Voyager::model('Permission')->generateFor('users');

        Voyager::model('Permission')->generateFor('settings');
    }
}
