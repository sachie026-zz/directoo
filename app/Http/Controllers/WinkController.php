<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wink;


class WinkController extends Controller
{
    //
    public function acceptWink(){

	}

	public function cancelWink(){

	}

	public function winkAlreadySent(){

	}

	public function sendWinkTo($fromid, $toid){
        try{
			$check = Wink::where('from_id', $frid)->where('to_id', $toid)->get();
			$checkReverse = Wink::where('to_id', $frid)->where('from_id', $toid)->get();
			if(empty($check)){		// doesnt follow
				if(empty($checkReverse)){
					$wink = new Wink;
					$wink->from_id = $frid;
					$wink->to_id = $toid;
					$saveResult = $wink->save();
					return $saveResult;
				}
				else {
					$wink = Wink::find($checkReverse->id);
					$wink->reply = "Accepted";
					return $wink->save();
				}
			}
			else{		//already follows
				$wink = Wink::find($wink->id);
				$wink->delete();
			}

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
