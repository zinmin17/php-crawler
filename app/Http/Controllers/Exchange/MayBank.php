<?php

namespace App\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MayBank extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $may_bank = 'https://www.maybank2u.com.my/maybank2u/malaysia/en/personal/rates/forex_rates.page';
        $curl = curl_init($may_bank);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($curl);
        curl_close($curl);
        
        $DOM = new \DOMDocument;
        libxml_use_internal_errors(true);
	    $DOM->loadHTML($output);
	
	    $Header = $DOM->getElementsByTagName('th');
        $Detail = $DOM->getElementsByTagName('td');

        //#Get header name of the table
        foreach($Header as $NodeHeader) 
        {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }

        //#Get row data/detail table without header name as key
        $i = 0;
        $j = 0;
        foreach($Detail as $sNodeDetail) 
        {
            $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
        }

        //#Get row data/detail table with header name as key and outer array index as row number
        for($i = 0; $i < count($aDataTableDetailHTML); $i++)
        {
            for($j = 0; $j < count($aDataTableHeaderHTML); $j++)
            {
                $aTempData[$i][$aDataTableHeaderHTML[$j]] = $aDataTableDetailHTML[$i][$j];
            }
        }
        //$aDataTableDetailHTML = $aTempData; 
        
        //unset($aTempData);
        //print_r($aDataTableDetailHTML); 
        
        return $aTempData;
        die();
        

    }
}