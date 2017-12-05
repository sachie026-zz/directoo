<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return "Helo";
// });

Route::get('/', 'UserController@home');

Route::get('loginUser', 'UserController@checkAndAddNewUser');

Route::get('getUserProfile', 'UserController@getProfileByFId');

Route::get('getNotifications', 'UserController@getNotifications');

Route::get('getWinks', 'WinkController@getWinksForFID');

Route::get('getSearchedUsers', 'UserController@getUsersForSearchText');

Route::get('getAllChats', 'UserController@getSentRequestsByUserId');

Route::get('sendWink', 'WinkController@sendWink');

Route::get('winkAlreadySent', 'WinkController@winkAlreadySent');

Route::get('getHomeStatus', 'UserController@homeStatus');


//POST

Route::post('updateProfile', 'UserController@updateProfileData');

Route::post('updateSettings', 'UserController@updateSettings');

Route::post('blockUser', 'UserController@blockUser');

//Route::post('sendWink', 'WinkController@sendWink');

Route::post('sendWinkBack', 'WinkController@sendWinkBack');

Route::post('rejectWink', 'WinkController@rejectWink');


//// API listing
/*
HIGH LEVEL ACTIONS

login
check and add user
search user
view user profile
send wink
view notification
view winks
accept wink
cancel wink
update profile
any new winks count
any new notification
is wink already sent
 

*/

/*
PAGE WISE API

HOME -> all winks count , any new winks, all notifications , any new notification
SEARCH -> All users, is wink sent, send wink , total users
PROFILE ->  is wink already sent, user profile data, profile views

*/

/*
DB QUERIES YO BE GENERAED PAGE WISE

HOME -> get winks and notification count
SEARCH -> get users count and users list with wink sent or not 
PROFILE -> get user data wink sent or not 

*/




/*


send wink ->  add entry to winks table, update profile winks count, update notification 
cancel wink -> delete winks entry, update profile winks , update notification
block user -> add entry to blocked list, update profile table winks , update notification
profile views -> update user profile profile count, entry to profile table
update profile ->  
get profile -> get and set to all fields on profile, also set to update profile pop ups fileds



*/
/*
GET
*******
login
getProfile
getReceievedRequests
getUsersForSearchText
getSentRequests
getChats





TABLES
********
users
requests
profiles
chats



DB FIELDS
*********
users -> id, fbid, name,  email, age, location
requests -> id, from, to , typeText, msg, time, action, viewd
blocks-> userid, blockedIds
profiles -> userid,  fbprofilelink, profile views, daterequestscount, proposalcount, about, receivedRequestsCount
request_types -> typeid, typetext
settings -> requests_from_fb, show_fb_link, show_men, show_women, notify_new_requests, notify_requests_accepted, notify_new_messages, account_deleted

requestnotifications-> requestid, from, to, action



CONTROLLERS
***********
user
wink
chat


*/