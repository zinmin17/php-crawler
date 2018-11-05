<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Facades\App\Http\Controllers\Test\facade_base1;

class facade_base extends Controller
{
    public function showFacade()
    {
        return facade_base1::showFacade1();
    }
}
