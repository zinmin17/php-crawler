<?php

namespace App\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BniBank extends Controller
{
    public function __construct()
    {
        $this->url = "http://www.bni.co.id/en-us/home/forexinformation";
        $this->result = [];
    }
    
    public function index()
    {
     
    }
        

    
}