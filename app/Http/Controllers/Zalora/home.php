<?php

namespace App\Http\Controllers\Zalora;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class home extends Controller
{
    public function showHome()
    {
        $url = "https://www.zalora.sg/tocco-toscano-noelle-twist-clasp-purse-%28black%29-black-614783.html?last_csa=justforyou_subcat_women";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($curl);
        curl_close($curl);
    
        
        $DOM = new \DOMDocument;
        libxml_use_internal_errors(true);
        $DOM->loadHTML( $output);

        // 1st Method
        
        //get by H1
        /* $items = $DOM->getElementsByTagName('h1');
        foreach ($items as $item){
            echo $item->nodeValue.'<br/>';
        }*/
        
        //get by ID
       /* $item_id = $DOM->getElementById('js-price');
            echo $item_id->nodeValue.'<br/>';
        */
   
        //2nd Method
        $xpath = new \DomXPath($DOM);
        
        //get by Class
       /* $class_name = 'prd-image';
        $classes = $xpath->query("//*[contains(@class, '$class_name')]");
        foreach($classes as $class) {
            //echo $class->nodeValue;
            echo $DOM->saveXML($class);
        }*/
        
        $class_name = 'product__otherImage';
        $classes = $xpath->query("//*[contains(@class, '$class_name')]");
        $side_images = [];
        foreach($classes as $class) {
            //echo $class->nodeValue;
            echo $DOM->saveXML($class);
            echo $class->getAttribute('src');
            //echo '<img src="'.$class->getAttribute('src').'" >';
        }
        
        // get by id
        $id_name = 'prdImage';
        $ides = $xpath->query("//*[contains(@id, '$id_name')]");
        foreach($ides as $id) {
            //echo $id->nodeValue;
            echo $DOM->saveXML($id);
            echo $img = $id->getAttribute('src');
        }
        
       /* echo '<img src="'.$img.'" >';*/
        
        //dd($title->nodeValue );
       /* return view('Zalora.home')
            ->with('items', $items);*/
    }
}
