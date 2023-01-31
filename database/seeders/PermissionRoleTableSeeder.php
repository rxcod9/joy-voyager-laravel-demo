<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Voyager::model('Role')->where('name', 'admin')->firstOrFail();

        $permissions = Voyager::model('Permission')->all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );
    }
}
