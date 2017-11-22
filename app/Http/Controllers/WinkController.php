<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wink;


class WinkController extends Controller
{
    //
    public function acceptWink(){
    	try{
//			$fromid = $request->input('from_id');
  //      	$toid = $request->input('to_id');   
        	$winkId = $request->input('wink_id');
        	$wink = Wink::find($winkId);
        	$wink->reply = "yes";
        	return $wink->save();

		}
		catch(Exception $ex){
			return -1;
		}
	}

	public function cancelWink(Request $request ){
		try{
//			$fromid = $request->input('from_id');
  //      	$toid = $request->input('to_id');   
        	$winkId = $request->input('wink_id');
        	$wink = Wink::find($winkId);
        	return $wink->delete();

		}
		catch(Exception $ex){
			return -1;
		}

	}

	//send wink conditions
	// 1 - sent but not recieved
	// 2 - sent and recieved
	// 3 - recieved but not accepted
	// 4 - recieved and accepted



	public function winkAlreadySentOrRecieved($fromid, $toid){
		try{
			$check = Wink::where('from_id', $fromid)->where('to_id', $toid)->get();
			$count =  count($check);
			if($count > 0 && $check[0]->reply == "accepted"){
				return 1;		// already sent and accepted
			}
			else if($count > 0 && $check[0]->reply != "accepted"){
				return 2;		// already sent but not accepted
			}
			else{

			}



			$checkReverse =  Wink::where('to_id', $fromid)->where('from_id', $toid)->get();
			$countR = count($checkReverse);
			if($countR > 0 && $checkReverse[0]->reply == "accepted"){
				return 3; 		// already recieved and accepted
			}
			else if($countR > 0 && $checkReverse[0]->reply != "accepted"){
				return 4;		// already recieved but not accepted	
			}
			else{
				return 5;
			}
		}
		catch(Exception $ex){
			return -1;			
		}
	}

	public function winkAlreadyRecieved($fromid, $toid){
		try{
			$check = Wink::where('from_id', $fromid)->where('to_id', $toid)->count();
			return $check > 0;

		}
		catch(Exception $ex){
			return -1;			
		}
	}

	public function sendWink(Request $request ){
        try{

        	$fromid = $request->input('from_id');
        	$toid = $request->input('to_id');        	

			$check = $this->winkAlreadySentOrRecieved($fromid, $toid);
			//return $check;
			//$checkReverse = Wink::where('to_id', $frid)->where('from_id', $toid)->get();
			if($check == 5){		// doesnt follow
					$wink = new Wink;
					$wink->from_id = $fromid;
					$wink->to_id = $toid;
					$saveResult = $wink->save();
					return $saveResult;				
			}
			return 2;
		}
		catch(Exception $ex){
			return -1;
		}

	}


	public function getWinksForFID(Request $request){
    	try{
    		$fbid = $request->input('fb_id');
    		$winks = Wink::where('to_id', $fbid)->get();
    		return $winks;

    	}
    	catch(Exception $ex){
    		return -1;
    	}
    
	}
}
