<?php

namespace app\Http\Controllers;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
}
