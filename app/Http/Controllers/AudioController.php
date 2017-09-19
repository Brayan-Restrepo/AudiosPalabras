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
    	
		$audios = AudiosModel::all('audio', 'palabra');
		print_r(count($audios)."\n");
		
        return response()
        	->json($audios, 200)
        	->header('Content-Type', 'application/json')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');;
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
     	
         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
        return response()
        	->json($audios, 200)
        	->header('Content-Type', 'application/json')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
	}

	public function create(Request $request){
		$dato=$request->input('url'); //Aqui obtienes el valor del input ajax
		
		if($dato==null){
			 return response()
        	->json("Dato Incopleto", 204);
		}
        return response()
        	->json($dato, 201)
        	->header('Content-Type', 'application/json')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');;
	}
}
