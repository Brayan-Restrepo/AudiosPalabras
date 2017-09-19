<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\AudiosModel;
use Faker\Factory as Faker;

class AudioController extends Controller
{
    public function index() {
        return view('index');
    }

	
    public function palabrasAll(Request $request)	{
    	
		$audios = AudiosModel::all('palabra');
		print_r(count($audios)."\n");
		$json = array();
		foreach ($audios as $value) {
			$json[] = ["palabra" => $value->palabra];	
		}
     	header('Access-Control-Allow-Origin: *'); 
	    header("Access-Control-Allow-Credentials: true");
	    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	    header('Access-Control-Max-Age: 1000');
	    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');
         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
        return response($json, 200);
	}

	public function palabras(Request $request)	{
    	 
		$audios = AudiosModel::all('palabra');
		$temp_array = array(); 
	    $i = 0; 
	    $key_array = array(); 
	    $key = "palabra";
	    foreach($audios as $val) { 
	        if (!in_array($val[$key], $key_array)) {
	            $key_array[$i] = $val[$key]; 
	            $temp_array[] = $val; 
	        } 
	        $i++; 
	    }
		$audios = $temp_array;
     	header('Access-Control-Allow-Origin: *'); 
	    header("Access-Control-Allow-Credentials: true");
	    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	    header('Access-Control-Max-Age: 1000');
	    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');
         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
        return response($audios, 200);
	}

	public function addPalabras(){
		
	}
}
