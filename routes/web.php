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
date_default_timezone_set('Asia/Jakarta');

Route::get('/s', function () {
    return view('welcome');
});

Route::get('/testing', function(){
	return view('portal');
});

// Route::post('/coba', 'ProjectController@delete_resource_api');

Route::get('/test', 'TestController@index');




// Route::get('/{id}', 'UserController@project');

Route::get('','UserController@page');
Route::group(['middleware' => 'auth'], function (){
	
	Route::get('/about', 'UserController@help');

	// Project
	Route::post('/invite_project', 'ProjectController@invite_project');
	Route::post('/add_project', 'ProjectController@add_project');
	Route::post('/add_resource', 'ProjectController@add_resource');
	Route::post('/edit_resource_update', 'ProjectController@edit_resource_update');
	Route::post('/generate_data','ProjectController@generate_data');
	Route::get('project/{id}','ProjectController@get_project');
	Route::get('project/{id}/p/{id_project}','ProjectController@detail_project');
	Route::get('project/{id}/p/{id_project}/resource/{id_resource}','ProjectController@edit_resource');
	Route::get('project/{id}/p/{id_project}/new_resource','ProjectController@new_resource');
	// Route::post('/delete_resource','ProjectController@delete_resource');
	Route::post('/delete_resource', 'ProjectController@delete_resource_api');
	Route::post('/delete_project/proses','ProjectController@delete_project_api');
});

// Route::get('/show/{all}', 'ProjectController@show_json')->where('all', '.*');
// Route::any('api/{project}/{all}', "ProjectController@handleRequest")->where('all', '.*');


//Administrator
Route::group(['middleware' => ['auth','rolesuser']], function (){
	Route::get('/admin/users', 'AdminController@user_show');
	Route::get('/admin/data_opsi', 'AdminController@get_data_opsi');
	Route::post('/delete_user','AdminController@delete_user');
	Route::get('/admin/projects','AdminController@project_show');
	Route::post('/delete_project','AdminController@delete_project');
	Route::get('/admin/projects/{id_project}','AdminController@resource_show');
	Route::get('/admin/data_category','AdminController@category_show');

	//Add Data
		#Mock Data
		Route::get('/admin/data_opsi/tambah', 'AdminController@add_data');
		Route::post('/admin/data_opsi/tambah/proses', 'AdminController@add_data_proses');

		#Kategori
		Route::get('/admin/data_category/tambah', 'AdminController@add_category');
		Route::post('/admin/data_category/tambah/proses', 'AdminController@add_category_proses');

	//Edit Data
		#Mock Data
		Route::get('/admin/data_opsi/edit/{id}', 'AdminController@edit_data');
		Route::post('/admin/data_opsi/edit/proses', 'AdminController@edit_data_proses');

		#Kategori
		Route::get('/admin/data_category/edit/{id}', 'AdminController@edit_category');
		Route::post('/admin/data_category/edit/proses', 'AdminController@edit_category_proses');
});





Route::get('/load', 'ProjectController@loadData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/tes')
