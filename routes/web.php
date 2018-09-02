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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','PagesController@getHome');
Route::get('/manage-bookings','PagesController@getManageBookings');
Route::get('/confirmed-bookings','PagesController@getConfirmedBookings');
Route::get('/completed-bookings','PagesController@getCompletedBookings');
/*Route::get('/clients','PagesController@getClients');*/
/*Route::get('/drivers','PagesController@getDrivers');*/
Route::get('/reminders','PagesController@getReminders');
Route::get('/reports','PagesController@getReports');
Route::get('/invoice','PagesController@getInvoice');
Route::get('/login','PagesController@getLogin');

Route::resource('users','UsersController');
Route::resource('drivers','DriversController');
Route::resource('bookings','BookingsController');
Route::resource('clients','ClientsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
