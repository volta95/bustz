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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'RoutesController@welcome')->name('welcome');

Auth::routes();
Route::get('admin/home', 'HomeController@admin');

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/forum', function () {
    return view('forum');
});




/*
|--------------------------------------------------------------------------
| Routes for user
|--------------------------------------------------------------------------
*/

Route::resource('users','UsersController');

/*
|--------------------------------------------------------------------------
| Routes for company
|--------------------------------------------------------------------------
*/

Route::resource('companies','CompaniesController');


/*
|--------------------------------------------------------------------------
| Routes for bus
|--------------------------------------------------------------------------
*/

Route::resource('buses','BusesController');

Route::get('buses/confirm', 'BusesController@confirm');



/*
|--------------------------------------------------------------------------
| Routes for route & broading point
|--------------------------------------------------------------------------
*/
Route::resource('routes','RoutesController');
Route::get('/search', 'RoutesController@search');
Route::resource('boading','BoadingController');

/*
|--------------------------------------------------------------------------
| Routes for ticket
|--------------------------------------------------------------------------
*/

Route::get('display/ticket/{id}', 'BusesController@view');

/*
|--------------------------------------------------------------------------
| Routes for scheduling
|--------------------------------------------------------------------------
*/

Route::resource('schedules','SchedulesController');
Route::get('schedules/getroute/{id}','SchedulesController@getRoute');




/*
|--------------------------------------------------------------------------
| Routes for staff
|--------------------------------------------------------------------------
*/
Route::resource('staff','StaffsController');
/*
|--------------------------------------------------------------------------
| Routes for booking
|--------------------------------------------------------------------------
*/
Route::resource('book', 'bookingController');
Route::get('proceed', 'bookingController@proceed')->name('proceed');
Route::get('proceed', 'bookingController@proceed')->name('proceed');
Route::post('payment', 'bookingController@payment')->name('payment');
Route::get('book', 'bookingController@store')->name('book.store');
Route::get('test', 'bookingController@test');
Route::get('/complete/{{ $books }}','bookingController@update')->name('book.update');
//route for pdf
Route::get('pdfview',array('as'=>'pdfview','uses'=>'bookingController@pdfview'));

Route::get('/myticket', 'bookingController@search')->name('myticket');

Route::get('/ticket', 'bookingController@form');
/*
|--------------------------------------------------------------------------
| Routes for
|--------------------------------------------------------------------------
*/
Route::get('paypal/express-checkout', 'PaypalController@expressCheckout')->name('paypal.express-checkout');
Route::get('paypal/express-checkout-success', 'PaypalController@expressCheckoutSuccess');
Route::post('paypal/notify', 'PaypalController@notify');
/*
|--------------------------------------------------------------------------
| Routes for lagguge
|--------------------------------------------------------------------------
*/
Route::get('luggages/{id}', 'LuggageController@index');
Route::get('luggage.store', 'LuggageController@store')->name('luggages.store');
//Route::resource('luggages', 'CargoController');
