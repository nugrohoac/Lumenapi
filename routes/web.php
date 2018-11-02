<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


//Generate Application Key
$router->get('/key', 'ExampleController@generateKey');

// //Latihan method get dan post
// $router->get('/foo', function () {
//     return 'Hello, Get Method!';
// });

// $router->post('/bar', function () {
//     return 'Hello, POST Method!';
// });


// //Menggunakan parameter
// $router->get('user/{id}', function ($id) {
//     return 'User id = ' . $id;
// });

// $router->get('post/{postId}/comments/{commendId}', function ($param1, $param2) {
//     return 'Post ID = ' . $param1 . ' Commend ID = ' . $param2;
// });

// $router->get('optional[/{param}]', function ($param = null) {
//     return $param;
// });


// $router->get('profile', function (){
//     return redirect()->route('route.profile');
// });

// //Memberikan alias di route
// $router->get('profile/myName', ['as' => 'route.profile', function () {
//     //return route('route.profile');
//     return 'Route Alias';
// }]);

// //Route Group
// $router->group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => ''], function() use ($router){
//     $router->get('home', function(){
//         return 'Home Admin';
//     });

//     $router->get('profile', function(){
//         return 'Profile Admin';
//     });
// });

//Mulai Menggunakan Middleware
$router->get('/admin/home' , ['middleware' => 'age', function () {
    return 'Old Enought';
}]);

$router->get('/fail', function () {
    return 'Not Yet mature';
});

$router->post('/foo', 'ExampleController@fooExample');

$router->get('/user/{id}', 'ExampleController@getUser');

$router->get('/post/cat1/{cat1}/cat2[/{cat2}]', 'ExampleController@getPost');

$router->get('/profile', ['as' => 'profile', 'uses' => 'ExampleController@getProfile']);

$router->get('/profile/action', ['as' => 'profile.action', 'uses' => 'ExampleController@getProfileAction']);

//$router->get('/admin/home', ['middleware' => 'age', 'uses' => 'ExampleController@methodNew']);

$router->get('/foo/bar', 'ExampleController@fooBar');
$router->post('/bar/foo', 'ExampleController@fooBar');

$router->post('/user/profile/request', 'ExampleController@userProfile');

$router->get('/response', 'ExampleController@response');