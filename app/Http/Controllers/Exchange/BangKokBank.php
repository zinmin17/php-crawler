<?php

namespace App\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BangKokBank extends Controller
{
    public function __construct()
    {
        $this->url = "https://www.exch.ktb.co.th/exchangerate/GetExchangeRate?dateView=&roundView=";
    }
    
    public function index()
    {
        $json = json_decode(file_get_contents($this->url), true); 
        
        foreach($json as $test) 
        {
            $aDataTableHeaderHTML[] = $test;
        }
        print_r($aDataTableHeaderHTML); die();
        
    }
}