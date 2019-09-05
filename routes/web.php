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
Route::get('/', 'Auth\LoginController@showHomePage');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/categories', 'CategoriesController@index')->name('category_list');
Route::get('/admin/categories/add', 'CategoriesController@add')->name('categories_add');
Route::post('admin/categories/add', 'CategoriesController@store')->name('category_store');
Route::get('admin/categories/edit/{slug}', 'CategoriesController@edit');
Route::patch('admin/categories/edit/{slug}', 'CategoriesController@update')->name('category_update');
Route::post('admin/categories/delete', 'CategoriesController@destroy');
// USER ROUTES

Route::get('admin/users','UsersController@index');
Route::get('admin/users/add','UsersController@add');
Route::get('admin/users/edit/{slug}','UsersController@edit');
Route::post('admin/users/add','UsersController@store');
Route::patch('admin/users/edit/{slug}','UsersController@update');
Route::post('admin/users/delete', 'UsersController@destroy');

//CHANLENGES ROUTES 

Route::get('/admin/challenges', 'ChallengeController@index')->name('challenge_list');
Route::get('/admin/challenges/add', 'ChallengeController@add')->name('challenges_add');
Route::post('admin/challenges/add', 'ChallengeController@store');
Route::get('admin/challenges/edit/{slug}', 'ChallengeController@edit');
Route::patch('admin/challenges/edit/{slug}', 'ChallengeController@update')->name('challenge_update');
Route::post('admin/challenges/delete', 'ChallengeController@destroy');

Route::get('/admin/campaigns', 'CampaignController@index')->name('campaign_list');
Route::get('/admin/campaigns/add', 'CampaignController@add')->name('campaigns_add');
Route::post('admin/campaigns/add', 'CampaignController@store')->name('category_store');;
Route::get('admin/campaigns/edit/{slug}', 'CampaignController@edit');
Route::patch('admin/campaigns/edit/{slug}', 'CampaignController@update')->name('campaign_update');
Route::post('admin/campaigns/delete', 'CampaignController@destroy');




