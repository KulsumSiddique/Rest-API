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

$router->group(['prefix' => 'api'], function () use ($router) {
    
    
    $router->get('ttl',  ['uses' => 'AuthorController@showAllAuthorsTtl']);

   
    $router->get('ttl/{id}', ['uses' => 'AuthorController@showOneAuthorTtl']);
  
    
    $router->post('ttl', ['uses' => 'AuthorController@createTtl']);
  
    //$router->delete('values/{id}', ['uses' => 'AuthorController@delete']);
  
    
    $router->put('ttl/{id}', ['uses' => 'AuthorController@updateTtl']);
});