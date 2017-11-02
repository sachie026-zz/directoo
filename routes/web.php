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

Route::get('/', function () {
    return "Hello";
});

Route::get('loginUser', 'UserController@checkAndAddNewUser');

Route::get('getUserProfile', 'UserController@getProfileByUserId');

Route::get('getSentRequests', 'UserController@getSentRequestsByUserId');

Route::get('getRecievedRequests', 'UserController@getSentRequestsByUserId');

Route::get('getSearchUsers', 'UserController@getUsersForSearchText');

Route::get('getAllChats', 'UserController@getSentRequestsByUserId');



//// API listing
/*
GET
*******
login
getProfile
getReceievedRequests
getUsersForSearchText
getSentRequests
getChats



POST
*******
createNewUser
sendRequestToUser
acceptRequest
cancelRequest
updateProfileAbout
updateSettings



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
request
chat


*/