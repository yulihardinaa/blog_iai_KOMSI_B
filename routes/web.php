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

//untug group
$router->group(
    ['middleware'=>'jwt.auth'],
    function() use ($router){

            //untuk menyimpan
            $router->post('/content','ContentController@store');

            //Menampilkan semua data
            $router->get('/content','ContentController@index');

            //menampilkan salah satu data
            $router->get('/content/{id}','ContentController@show');

            // untuk mengubah data tertentu
            $router->put('/content/{id}','ContentController@update');

            // untuk menghapus data tertentu
            $router->delete('/content/{id}','ContentController@destroy');
    }
);
//untuk POST pada user
$router->post('/user','UserController@store');
//Untuk Log In
$router->post('/auth/login',[
    'uses'=>'AuthController@authenticate'
]);
