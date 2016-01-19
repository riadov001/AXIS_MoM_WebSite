<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'PublicController@anyIndex');
Route::get('/home', 'PublicController@anyIndex');

// Controller public pour les interraction publiques
Route::controller('public', 'PublicController', [
    "anySearchEntity" => "public.search",
    "anyEntity" => "public.show",
]);

Route::get('admin', 'Admin\AdminController@Index');
Route::get('admin/view/{uri}', 'Admin\AdminController@view');
Route::get('admin/view/{uri}/{property}/{value}', 'Admin\AdminController@updateEntityProperty');
Route::get('admin/delete/LOD/{EntityID}/{LODID}', 'Admin\AdminController@deleteLOD');
Route::get('admin/update/LOD/{EntityID}/{LODID}/{value}', 'Admin\AdminController@updateLOD');
Route::get('admin/addEntity/{type}/{name}/{description}/{image}', 'Admin\AdminController@addEntity');

// TODO
Route::get('admin/users/{users}/editPW', array('as' => 'admin.users.editPW', 'uses' => 'UserController@editPW'));
Route::post('admin/users/{users}', array('as' => 'admin.users.updatePW', 'uses' => 'UserController@updatePW'));

// Authentication routes...
Route::post('auth/connexion', 'Auth\AuthentificationController@postLogin');
Route::post('auth/deconnexion', 'Auth\AuthentificationController@postLogout');

