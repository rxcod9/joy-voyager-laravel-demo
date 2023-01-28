<?php

namespace App\Http\Controllers;

use Joy\VoyagerDatatable\Http\Traits\AjaxAction;
use Joy\VoyagerDatatable\Http\Traits\IndexAction;
use Joy\VoyagerCore\Http\Controllers\VoyagerRoleController as BaseVoyagerRoleController;

class VoyagerRoleController extends BaseVoyagerRoleController
{
    use IndexAction;
    use AjaxAction;
}
