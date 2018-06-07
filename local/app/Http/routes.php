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

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'  =>'admin.users.destroy'
		]);
	
	Route::resource('Instaladores','InstaladoresController');		
	Route::get('Instaladores/{Id}/destroy',[
		'uses'=>'InstaladoresController@destroy',
		'as'  =>'admin.Instaladores.destroy'
		]);

	Route::resource('Clientes','ClientesController');
	Route::get('Clientes/{Id}/destroy',[
		'uses'=>'ClientesController@destroy',
		'as'  =>'admin.Clientes.destroy'
		]);
	Route::resource('Inventarios','InventariosController');	
	Route::get('Inventarios/{Id}/destroy',[
		'uses'=>'InventariosController@destroy',
		'as'  =>'admin.Inventarios.destroy'
		]);

	Route::get('Eventos/creacionfechas',[
		'uses'=>'EventosController@creacionfechas',
		'as'  =>'admin.Eventos.creacionfechas'
	]);
	Route::post('Eventos/creacionfechas',[
		'uses'=>'EventosController@storefechas',
		'as'  =>'admin.Eventos.creacionfechas'
	]);
	
	Route::get('Eventos/agenda',[
		'uses'=>'EventosController@agenda',
		'as'  =>'admin.Eventos.agenda'
	]);


	Route::resource('Eventos','EventosController');	
	
	Route::get('Eventos/{Id}/destroy',[
		'uses'=>'EventosController@destroy',
		'as'  =>'admin.Eventos.destroy'
	]);



	


	





});

	Route::auth();



Route::auth();

Route::get('/home', 'HomeController@index');
