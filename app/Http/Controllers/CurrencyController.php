<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function getCur(){
        $res = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/')->json();
        // foreach($res as $re){
        //     $data = $re->id;
        //     echo $data."<br>";
        // }
        // $data = usort($res, 'id');
        $data = collect($res)->sortBy('id')->toArray();
        // $data = (object) $array;
        // return $data;
        // return gettype($data);
        return view('Currency.currency', compact('data'));

    }
}
