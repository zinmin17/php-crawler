<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Facades\App\Http\Controllers\Test\facade_base;

class facade extends Controller
{
    public function index()
    {
        return facade_base::showFacade();
    }
}
