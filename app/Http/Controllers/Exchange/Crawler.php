<?php

namespace App\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Exchange\MayBank;
use App\Http\Controllers\Exchange\BangKokBank;
use App\Http\Controllers\Exchange\VietComBank;

class Crawler extends Controller
{
    
    protected $mayBank;
    protected $bangkokBank;
    protected $vietcomBank;
    
    public function __construct(MayBank $mayBank,
                               BangKokBank $bangkokBank,
                               VietComBank $vietcomBank)
    {
        $this->mayBank = $mayBank;
        $this->bangkokBank = $bangkokBank;
        $this->vietcomBank = $vietcomBank;
    }
    
    public function index()
    {
       
        //$mb = $this->mayBank->index();
        //return $mb;
        
        $bkb = $this->bangkokBank->index();
        return $bkb;
        
        $vcb = $this->vietcomBank->index();
        return $vcb;

    }
    
    
}