<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Voyager::model('Menu')->firstOrCreate([
            'name' => 'admin',
        ]);
    }
}
