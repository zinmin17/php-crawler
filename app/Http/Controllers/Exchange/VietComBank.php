<?php

namespace App\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VietComBank extends Controller
{
    public function __construct()
    {
        $this->url = "http://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx";
        $this->result = [];
    }
    
    public function index()
    {
        $xml=simplexml_load_file($this->url) or die("Error: Cannot create object"); 
        
        foreach($xml->children() as $exrate) { 
            if($exrate['CurrencyCode']){
                $this->result [] = $exrate;
            }
        }
        
        return $this->result ;
    }
        

    
}