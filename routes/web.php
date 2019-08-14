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
// public route
Route::get('/','HomeController@Home')->name('index');

Route::get('/laravelgooglechart','LaravelGoogleGraph@index')->name('showcharts');


//Registaer section

Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('/signin','HomeController@Login')->name('web.signin');

Route::get('/register','HomeController@Register')->name('web.signup');

Route::post('/sign-up','Auth\RegisterController@register')->name('register');

Route::get('/logout','Auth\LoginController@logout')->name('logout');


// Admin section

// Route::get('/admin','WebadminController@Listdata')->name('webadmin.index')->middleware('auth');
Route::group(['prefix'=>'/admin','middleware'=>[]],function(){

Route::get('/','WebadminController@Listdata')->name('webadmin.index');

//Payment

Route::get('/payment','WebadminController@Payment')->name('webadmin.payment');

Route::post('/payment/list','WebadminController@SavePayment')->name('webadmin.savepayment');

//Youths

Route::get('/newyouth','WebadminController@AddYouth')->name('webadmin.addyouth');

Route::post('/youth/post','WebadminController@SaveYouth')->name('webadmin.saveyouth');

Route::get('/youth/list','WebadminController@ListallYouth')->name('webadmin.listyouth');

Route::post('/youth/delete/{id}','WebadminController@DeleteYouth')->name('webadmin.deleteyouth');

//Womens

Route::get('/newwomen','WebadminController@AddWomen')->name('webadmin.addwomen');

Route::post('/women/post','WebadminController@SaveWomen')->name('webadmin.savewomen');

Route::get('/women/list','WebadminController@ListallWomen')->name('webadmin.listwomen');

Route::post('/women/delete/{id}','WebadminController@DeleteWomen')->name('webadmin.deletewomen');

//Laoworkers

Route::get('/newlaoworker','WebadminController@AddLaoworker')->name('webadmin.addlaoworker');

Route::post('/laoworker/post','WebadminController@SaveLaoworker')->name('webadmin.savelaoworker');

Route::get('/laoworker/list','WebadminController@ListallLaoworker')->name('webadmin.listlaoworker');

Route::post('/laoworker/delete/{id}','WebadminController@DeleteLaoworker')->name('webadmin.deletelaoworker');

//staff
Route::get('/newstaff','WebadminController@AddStaff')->name('webadmin.addstaff');

Route::post('/staff/post','WebadminController@SaveStaff')->name('webadmin.savestaff');

Route::get('/staff/update/{id}','WebadminController@GetUpdatestaff')->name('webadmin.getupdatestaff');

Route::post('/staff/update/{id}','WebadminController@UpdateStaff')->name('webadmin.updatestaff');

Route::post('/staff/delete/{id}','WebadminController@DeleteStaff')->name('webadmin.deletestaff');

//Profile and Activity

Route::get('/activity','WebadminController@AddActivity')->name('webadmin.addactivity');

Route::post('/activity/post','WebadminController@SaveActivity')->name('webadmin.saveactivity');

Route::get('/activity/list','WebadminController@ListallActivity')->name('webadmin.listactivity');

Route::get('/profile/{id}','WebadminController@Profile')->name('webadmin.profile');

//new Location, Position, Adtivitytype

Route::get('/Location','WebadminController@AddnewLocation')->name('webadmin.addlocation');

Route::post('/Location/post','WebadminController@SaveLocation')->name('webadmin.savelocation');

Route::get('/Location/list','WebadminController@ListLocation')->name('webadmin.listlocation');

Route::get('/Activitytype','WebadminController@AddnewActivity')->name('webadmin.addactivitytype');

Route::post('/Activitytype/post','WebadminController@SaveActivitytype')->name('webadmin.saveactivitytype');

Route::get('/Activitytype/list','WebadminController@ListallActivitytype')->name('webadmin.listactivitytype');


// Lao member

Route::get('/laomember','WebadminController@AddLaomember')->name('webadmin.addlaomember');

Route::post('/laomember/post','WebadminController@SaveLaomember')->name('webadmin.savelaomember');

Route::get('/laomember/list','WebadminController@ListLaomember')->name('webadmin.listlaomember');

Route::get('/laomember/update/{id}','WebadminController@GetUpdatelaomember')->name('webadmin.getupdatelaomember');

Route::post('/laomember/update/{id}','WebadminController@UpdateLaomember')->name('webadmin.updatelaomember');

Route::post('/laomember/delete/{id}','WebadminController@DeleteLaomember')->name('webadmin.deletelaomember');

// soldier

Route::get('/laosoldier','WebadminController@AddLaosoldier')->name('webadmin.addlaosoldier');

Route::post('/laosoldier/post','WebadminController@SaveLaosoldier')->name('webadmin.savelaosoldier');

Route::get('/laosoldier/list','WebadminController@ListallLaosoldier')->name('webadmin.listlaosoldier');

Route::post('/laosoldier/delete/{id}','WebadminController@DeleteLaosoldier')->name('webadmin.deletelaosoldier');


// slide show

Route::get('/slideshow','WebadminController@AddSlideshow')->name('webadmin.addslideshow');

Route::post('/slideshow/post','WebadminController@SaveSlideshow')->name('webadmin.saveslideshow');

Route::get('/slideshow/list','WebadminController@ListallSlideshow')->name('webadmin.listallslideshow');

Route::post('/slideshow/delete/{id}','WebadminController@DeleteSlideshow')->name('webadmin.deleteslideshow');

});