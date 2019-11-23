<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Book;
use App\Luggage;

class LuggageController extends Controller
{
    //


    public function index($id){


    	$bus = Luggage::where('bus_id',$id)->get();
    	//return $bus;
    	$max_cargo_weight = Bus::where('id',$id)->get('max_cargo_weight');
    	//return $max_cargo_weight;

        if(!$bus){
           foreach ($bus as $buses) {
    		# code...
    		$weight_used = $buses->sum('weight');
    		$weight_left = $max_cargo_weight - $weight_used;
            return $weight_used;

    		if($weight_used >= $max_cargo_weight){
                //$nospace = "no available space";
                return 5;
                //continue;
            } else{

                return view('luggage')->with('bus_id', $id);

             }
    	   }

        }else{
        	return view('luggage')->with('bus_id', $id);
        }

    }



    public function store(Request $request){

    	//capture luggage infos

    	 $book = Luggage::create([
                'sender' => $request->input('sender'),
                's_contact' => $request->input('s_contact'),
                'receiver' => $request->input('receiver'),
                'r_contact' => $request->input('r_contact'),
                'from' => $request->input('from'),
                'destination' => $request->input('destination'),
                'description' => $request->input('description'),
                'weight'=> $request->input('weight'),
                'bus_id'=>$request->input('bus_id')
            ]);
if($book){
            return view('invoice',['book'=>$book]);
}

    }



}

