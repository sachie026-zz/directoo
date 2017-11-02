<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //


    public function checkAndAddNewUser(Request $request){
    	try{
    		 // $User = new User;
		     //    $User->name = "sachin";
		     //    $User->fb_profile_uri = "sss.jpg";
		     //    $User->email = "jadhavsachin174@gmail.com";
		     //    $User->age = "25";
		     //    $User->location = "pune, india";
		     //    $User->gender = "male";

		     //    $saved = $User->save();

		     //    return 1;
    		$email = $request->input('email');
    		$present = User::where('email', $email)->count() == 1 ? true : false;
    		if(!$present){
		        $User = new User;
		        $User->name = $request->input('name');
		        $User->fb_profile_uri = $request->input('profile_uri');
		        $User->email = $email;
		        $User->age = $request->input('age');
		        $User->location = $request->input('location');
		        $User->gender = $request->input('gender');

		        $saved = $User->save();
		        return 1;    			
    		}
    		return 2;

    	}
    	catch(Exception $ex){
    		return -1;
    	}
    
	}
}	
