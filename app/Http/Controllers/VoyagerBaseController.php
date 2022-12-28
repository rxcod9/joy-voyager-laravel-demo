<?php

namespace App\Http\Controllers;

use Joy\VoyagerDatatable\Http\Traits\AjaxAction;
use Joy\VoyagerDatatable\Http\Traits\IndexAction;
use Joy\VoyagerDatatable\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class VoyagerBaseController extends BaseVoyagerBaseController
{
    use IndexAction;
    use AjaxAction;
}
