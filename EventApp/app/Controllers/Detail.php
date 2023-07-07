<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Detail extends BaseController
{
    public function index()
    {
        return view('/event/detail');
    }
}
