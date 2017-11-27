<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use DB;

class UserController extends Controller
{
    /*

	
	
	---> load profile
	fb_id

	---> send wink
	from, to

	already winked from other one
	already winked
	unwink

	---> get notification
	fb_id

	all notifications with for_id , not viewed

	---> get winks
	fb_id

	where fb_id, and not viewed

	expire after viewed




	send wink on profile
	update data
	getnotifications
	get winks
	*/

	public function home(){
		return "home";
	/*$notifications = DB::table('notifications')
            ->join('users', 'users.fb_id', '=', 'notifications.for_id')
            ->select('notifications.*', 'users.fname', 'users.lname' , 'fb_profile_uri')
            ->get();
  	  
		  	$toid = "1";
			$fromid = "2";
			
			$results = DB::table('users')
                     ->where('users.fb_id', '=', "1")
					 ->distinct()
                       ->get();
	        */
			
//				return $results;
//		  return $notifications;
	}	

	public function blockUser(Request $request){
			$fromid = $request->input('fb_id');
			$toid = $request->input('fb_id');

	}

	public function incrementProfileViewCountForFID(Request $request){
		try{
			$fbid = $request->input('fb_id');
			DB::table('users')->increment('profile_views', 1, ['fb_id' => $fbid]);
		}
		catch(Exception $ex){
			return -1;
		}
	}







	public function getNotifications(Request $request){
		try{
			$fbid = $request->input('fb_id');	
			$notifications = Notification::where('for_id', $fbid)->where('viewed', false)->get();	
			return $notifications;
		}
		catch(Exception $ex){
			return -1;
		}
	}

	public function updateProfile(Request $request){
		try{
			$fbid = $request->input('fb_id');
			$user = User::where('fb_id', $fbid)->get();
			if($fbid){
				$profile = User::find($user->id);
				$profile->location = $request->input('location');
				$profile->about = $request->input('about');
				$profile->save();
			}
			return -1;
		}
		catch(Exception $ex){
			return -1;
		}
		    
	}

	public function setStatusForViewedNotifications(){

	}


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
    		$fb_id = $request->input('fb_id');
    		$present = User::where('fb_id', $fb_id)->count() == 1 ? true : false;
    		if(!$present){
		        $User = new User;
		        $User->name = $request->input('name');
		        $User->fname = $request->input('fname');
		        $User->fb_id = $fb_id;		        
		        $User->lname = $request->input('lname');
		        $User->fb_profile_uri = $request->input('fb_profile_uri');
		        $User->email = $request->input('email');
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


	public function getUsersForSearchText(Request $request){
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
    		$searchText = $request->input('name');
    		$users = User::where('name', 'LIKE', $searchText)->get();
    		return $users;
    	}
    	catch(Exception $ex){
    		return -1;
    	}
	}

	public function getProfileByFId(Request $request){
		try{
			
		/*	$results = DB::table('users')
                     ->distinct()
                     ->leftJoin('winks', function($join)
                         {
                             $join->on('from_id', '>=', '');
                             $join->on('to_id', '>=', '');
                         })
                     ->where('user.fb_id', '=', $toid)
                     ->get();
			
				return $results;
			//
			*/
			
			$toid = $request->input('fb_id');
			$fromid = $request->input('from_id');
			
			/*$users = DB::table('winks')
                ->whereColumn([
                    ['to_id', '=', $toid],
                    ['from_id', '>', $fromid]
                ])->get();
			*/
			
			$user = User::where('fb_id', $toid)->get();
	    	return $user;
		}
		catch(Exception $ex){
			return -1;
		}
	}
}	
