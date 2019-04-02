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

Route::get('/', function () {
    return view('home');
});
Route::get('/home','PageController@Home');
Route::get('/login','LoginController@index');
Route::get('/memberPage','LoginController@userpage');
Route::get('/adminPage','LoginController@adminpage');
Route::get('/logout','LoginController@logout');
Route::get('/register','RegisterController@index');
Route::post('/store','RegisterController@store');
Route::post('/next','LoginController@next');
Route::get('/cart','PageController@Cart');
Route::get('/updateProfile','PageController@Update');
Route::get('/phoneList','PageController@phonelist');
Route::get('/transactionHistory','PageController@transaction');
Route::post('/update','RegisterController@update');
Route::get('/insertPhone','adminController@insertP');
Route::get('/managePhones','adminController@manageP');
Route::get('/insertBrand','adminController@insertB');
Route::get('/manageBrand','adminController@manageB');
Route::get('/insertMember','adminController@insertM');
Route::get('/manageMembers','adminController@manageM');
Route::get('/detailTH','PageController@detail');
Route::post('/insertMember','insertMemberController@insertMember');
Route::post('/insertPhone','insertPhoneController@insertPhone');
Route::post('/insert','brandController@insert');
Route::get('/insertPhone','insertPhoneController@index');
Route::get('/managePhones','insertPhoneController@manage');
Route::get('/updatePhone','PageController@updateP');
Route::get('/updatePhone','insertPhoneController@update');
Route::post('/updatePhone','insertPhoneController@updatePhone');
Route::get('/manageBrand','insertPhoneController@manageB');
Route::post('/updateManageBrand','insertPhoneController@updateManageBrand');
Route::get('/updateBrand','PageController@updateB');
Route::get('/updateMember','PageController@updateM');
Route::get('/manageMembers','insertPhoneController@manageM');
Route::post('/updateMember','insertPhoneController@updateMember');
Route::post('/deleteItem/{id}','insertPhoneController@deleteItem');
Route::get('/phoneList','insertPhoneController@phonelist');
Route::get('/transactionDetail','PageController@transactionDetail');
Route::post('/deleteBrand/{id}','insertPhoneController@deleteBrand');
Route::get('/cartPayment','PageController@cartPayment');
Route::post('/deleteMember/{id}','insertPhoneController@deleteMember');
Route::post('/addToCart/{id}','itemController@addToCart');
Route::post('/addPayment','itemController@addPayment');
