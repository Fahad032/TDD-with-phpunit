<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
   // return view('welcome');
   
   new \Laracasts\Repositories\BlogRepositories;
});


Route::get("accomodations", function(){
	new \Mycompany\AccomodationRepository\Accomodation;
});

// Simpler guzzle test route

Route::get('/user/{username}', function($username){
		echo "Hello ". $username;
		
		/*
		$client = new \GuzzleHttp\Client([
					//	'base_uri' => 'https://api.twitter.com/1.1',
						'base_uri' => 'https://api.github.com',										
						'timeout' => 2.0
						]);
		
		$response = $client->get("users/Fahad032")->send();
		*/

$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://api.github.com/');

	//	dd($res);

//echo $res->getStatusCode();
// "200"
print_r($res->getHeader('content-type'));
// 'application/json; charset=utf8'

print_r($res->getBody());
//echo $res->getBody();		
						
		
	//	$oAuth = \GuzzleHttp\oAuth				
						
						
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
