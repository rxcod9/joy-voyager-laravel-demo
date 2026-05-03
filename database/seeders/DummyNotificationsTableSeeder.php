<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;

class DummyNotificationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (Voyager::model('Notification')->query()->count() > 0) {
            return false;
        }

        $count = 20;
        // Voyager::model('Notification')->factory()
        //     ->count($count)
        //     ->create();
    }
}
