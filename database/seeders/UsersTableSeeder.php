<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Voyager::model('Role')->where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
        }

        $count = (int) env('USERS_COUNT', 100);
        $role  = Voyager::model('Role')->firstOrNew(['name' => 'user']);
        if (User::whereRoleId($role->id)->count() <= 1) {
            User::factory()
                ->count($count - 1)
                ->state(function (array $attributes) use ($count) {
                    return [
                        'email' => 'user' . time()
                            . '-' . rand(1, $count)
                            . '-' . rand(1, $count)
                            . '-' . rand(1, $count)
                            . '@example.com'
                    ];
                })
                ->create();
        }
    }
}
