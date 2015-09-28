<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::get('home', function()
{
	return View::make('home');
});

    Route::get('home', 'RegistrationController@login');
	Route::post('home', 'RegistrationController@authenticate');

	Route::get('login', 'RegistrationController@register'); 
	Route::post('login', 'RegistrationController@store');

Route::group(array('before'=>'auth'),function(){
	
	//Logout
    Route::get('logout',                array('as' => 'logout',     'uses' => 'RegistrationController@logout'));

    Route::get('home',                  array('as' => 'home',       'uses' => 'RegistrationController@home'));

    Route::group(array('prefix' => 'sungai'), function() {
    	Route::get( '/', 				array('as' => 'beranda', 	'uses' => 'SungaiController@index'));
		#### Controller untuk Sungai
		Route::get( 'sungai/buat', 		array('as' => 'buat', 		'uses' => 'SungaiController@buat'));
		Route::post('sungai', 			array('as' => 'post-buat', 	'uses' => 'SungaiController@postBuat'));
		Route::get( 'sungai/{id}/ubah', array('as' => 'ubah', 		'uses' => 'SungaiController@ubah'));
		Route::post('sungai/{id}', 		array('as' => 'post-ubah', 	'uses' => 'SungaiController@postUbah'));
		Route::get( 'sungai/{id}/hapus',array('as' => 'hapus', 		'uses' => 'SungaiController@hapus'));

		Route::post('cari/sungai', 		array('as' => 'cari-sungai', 'uses' => 'SungaiController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-sungai', 'uses' => 'SungaiController@urut'));

	});

	 Route::group(array('prefix' => 'das'), function() {
    	Route::get( '/', 				array('as' => 'berandadas',   'uses' => 'DasController@index'));
		#### Controller untuk Das
		Route::get( 'das/buatdas', 		array('as' => 'buatdas', 	  'uses' => 'DasController@buat'));
		Route::post('das', 			    array('as' => 'post-buatdas', 'uses' => 'DasController@postBuat'));
		Route::get( 'das/{id}/ubah',    array('as' => 'ubahdas', 	  'uses' => 'DasController@ubah'));
		Route::post('das/{id}', 		array('as' => 'post-ubahdas', 'uses' => 'DasController@postUbah'));
		Route::get( 'das/{id}/hapus',   array('as' => 'hapusdas', 	  'uses' => 'DasController@hapus'));

		Route::post('cari/das', 		array('as' => 'cari-das',      'uses' => 'DasController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-das',      'uses' => 'DasController@urut'));

	});

	 Route::group(array('prefix' => 'group'), function() {
    	Route::get( '/', 				array('as' => 'berandagroup',   'uses' => 'GroupController@index'));
		#### Controller untuk group
		Route::get( 'group/buatgroup', 	array('as' => 'buatgroup', 	    'uses' => 'GroupController@buat'));
		Route::post('group', 			array('as' => 'post-buatgroup', 'uses' => 'GroupController@postBuat'));
		Route::get( 'group/{id}/ubah',  array('as' => 'ubahgroup', 	    'uses' => 'GroupController@ubah'));
		Route::post('group/{id}', 		array('as' => 'post-ubahgroup', 'uses' => 'GroupController@postUbah'));
		Route::get( 'group/{id}/hapus', array('as' => 'hapusgroup', 	'uses' => 'GroupController@hapus'));

		Route::post('cari/group', 		array('as' => 'cari-group',     'uses' => 'GroupController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-group',     'uses' => 'GroupController@urut'));

	});

	  Route::group(array('prefix' => 'user'), function() {
    	Route::get( '/', 				array('as' => 'berandauser',    'uses' => 'UsersController@index'));
		#### Controller untuk User
		Route::get( 'user/buatuser', 	array('as' => 'buatuser', 	    'uses' => 'UsersController@buat'));
		Route::post('user', 			array('as' => 'post-buatuser',  'uses' => 'UsersController@postBuat'));
		Route::get( 'user/{id}/ubah',   array('as' => 'ubahuser', 	    'uses' => 'UsersController@ubah'));
		Route::post('user/{id}', 		array('as' => 'post-ubahuser',  'uses' => 'UsersController@postUbah'));
		Route::get( 'user/{id}/hapus',  array('as' => 'hapususer', 	    'uses' => 'UsersController@hapus'));

		Route::post('cari/', 		    array('as' => 'cari-user',      'uses' => 'UsersController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-user',      'uses' => 'UsersController@urut'));
		//Route::resource('user','UsersController');

	});

	 Route::group(array('prefix' => 'codes'), function() {
    	Route::get( '/', 				array('as' => 'berandacodes',   'uses' => 'CodesController@index'));
		#### Controller untuk User
		Route::get( 'codes/buatcodes', 	array('as' => 'buatcodes', 	    'uses' => 'CodesController@buat'));
		Route::post('codes', 			array('as' => 'post-buatcodes', 'uses' => 'CodesController@postBuat'));
		Route::get( 'codes/{id}/ubah',  array('as' => 'ubahcodes', 	    'uses' => 'CodesController@ubah'));
		Route::post('codes/{id}', 		array('as' => 'post-ubahcodes', 'uses' => 'CodesController@postUbah'));
		Route::get( 'codes/{id}/hapus', array('as' => 'hapuscodes', 	'uses' => 'CodesController@hapus'));
		Route::post('cari/', 		    array('as' => 'cari-codes',     'uses' => 'CodesController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-codes',     'uses' => 'CodesController@urut'));

		//detail codes
		Route::get('codes/{id}/detail',  array('as' => 'berandacodesdetail',    'uses' => 'CodesController@indexdetail'));
		//hapus detail posts/{post}/comments/{comment}
		Route::get('codes/{id1}/hapus/{id2}',   array('as' => 'hapusdetail', 	        'uses' => 'CodesController@hapusDetail'));
		//buat detail
		Route::get( 'codes/{id}', 	     array('as' => 'buatcodesdetail',       'uses' => 'CodesController@buatDetail'));			
		Route::post('codess', 		     array('as' => 'post-buatcodesdetail',  'uses' => 'CodesController@postBuatDetail'));
		// ubah detail
		Route::get( 'codes/{id}/ubaha',  array('as' => 'ubahcodesdetail', 	    'uses' => 'CodesController@ubahDetail'));
		Route::post('codes/{id}', 		 array('as' => 'post-ubahcodesdetail',  'uses' => 'CodesController@postUbahDetail'));

	});

	 Route::group(array('prefix' => 'menu'), function() {
    	Route::get( '/', 				array('as' => 'berandamenu',    'uses' => 'MenuController@index'));
		#### Controller untuk menu
		Route::get( 'menu/buatmenu', 	array('as' => 'buatmenu', 	    'uses' => 'MenuController@buat'));
		Route::post('codes', 			array('as' => 'post-buatmenu',  'uses' => 'MenuController@postBuat'));
		Route::get( 'menu/{id}/ubah',   array('as' => 'ubahmenu', 	    'uses' => 'MenuController@ubah'));
		Route::post('menu/{id}', 		array('as' => 'post-ubahmenu',  'uses' => 'MenuController@postUbah'));
		Route::get( 'menu/{id}/hapus',  array('as' => 'hapusmenu', 	    'uses' => 'MenuController@hapus'));

		
		Route::post('cari/', 		    array('as' => 'cari-menu',      'uses' => 'MenuController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-menu',      'uses' => 'MenuController@urut'));

	});

	Route::group(array('prefix' => 'ws'), function() {
    	Route::get( '/', 				array('as' => 'berandaws',    'uses' => 'WsController@index'));
		#### Controller untuk ws
		Route::get( 'ws/buatws', 	    array('as' => 'buatws', 	  'uses' => 'WsController@buat'));
		Route::post('ws', 			    array('as' => 'post-buatws',  'uses' => 'WsController@postBuat'));

		Route::post( 'ws/buatwsprov', 	array('as' => 'buatwsprov',       'uses' => 'WsController@postBuatProv'));
		
		Route::get( 'ws/{id}/ubah',     array('as' => 'ubahws', 	  'uses' => 'WsController@ubah'));
		Route::post('ws/{id}', 		    array('as' => 'post-ubahws',  'uses' => 'WsController@postUbah'));
		Route::get( 'ws/{id}/hapus',    array('as' => 'hapusws', 	  'uses' => 'WsController@hapus'));

		Route::get( 'ws/{id}/hapus',    array('as' => 'hapuswsprov', 	  'uses' => 'WsController@hapusProv'));

		
		Route::post('cari/', 		    array('as' => 'cari-ws',      'uses' => 'MenuController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-ws',      'uses' => 'MenuController@urut'));

	});

	Route::group(array('prefix' => 'wilayahsungai'), function() {
    	Route::get( '/', 				array('as' => 'berandawilayahsungai',    'uses' => 'WilayahSungaiController@index'));
		#### Controller untuk ws
		Route::get( 'ws/buatws', 	    array('as' => 'buatws', 	  'uses' => 'WsController@buat'));
		Route::post('ws', 			    array('as' => 'post-buatws',  'uses' => 'WsController@postBuat'));

		Route::post( 'ws/buatwsprov', 	array('as' => 'buatwsprov',       'uses' => 'WsController@postBuatProv'));
		
		Route::get( 'ws/{id}/ubah',     array('as' => 'ubahws', 	  'uses' => 'WsController@ubah'));
		Route::post('ws/{id}', 		    array('as' => 'post-ubahws',  'uses' => 'WsController@postUbah'));
		Route::get( 'ws/{id}/hapus',    array('as' => 'hapusws', 	  'uses' => 'WsController@hapus'));

		Route::get( 'ws/{id}/hapus',    array('as' => 'hapuswsprov', 	  'uses' => 'WsController@hapusProv'));

		
		Route::post('cari/', 		    array('as' => 'cari-ws',      'uses' => 'MenuController@cari'));
		Route::get( 'urut/{jenis}',		array('as' => 'urut-ws',      'uses' => 'MenuController@urut'));

	});

	 // Testing
	 Route::Group(array('prefix' => 'tes'), function(){
	 	Route::get('/',                 array('as' => 'berandates',     'uses' => 'TestController@index'));

	 	Route::get('posts/{post}/comments/{comment}', array('as' => 'tampildet',      'uses' => 'TestController@tampildetail'));

	 });
});








