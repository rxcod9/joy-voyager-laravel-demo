<?php

namespace App\Http\Controllers;

use Joy\VoyagerDatatable\Http\Controllers\VoyagerBaseController as ControllersVoyagerBaseController;
use Joy\VoyagerDatatable\Http\Traits\AjaxAction;
use Joy\VoyagerDatatable\Http\Traits\IndexAction;

class VoyagerBaseController extends ControllersVoyagerBaseController
{
    use IndexAction;
    use AjaxAction;
}
