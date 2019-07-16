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

Route::get('/import', 'ImportController@getImport')->name('import');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');
// Route::post('/items', 'ImportController@processImport')->name('itemsview');

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin', 'ImportController@getAdmin')->name('admin');
// Route::get('/moderator', 'ImportController@getModerator')->name('moderator');
// Route::get('/user', 'ImportController@getUser')->name('user');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'LoginController@authenticated')->name('admin');
// Route::get('/user', 'LoginController@authenticated')->name('user');
// Route::get('/moderator', 'LoginController@authenticated')->name('moderator');
// Route::post('/contact/{id}/edit/update/{id}', 'ContactController@update')->name('update');
// Route::post('/contact/{id}/edit/update/{id}', 'ContactController@update')->name('update');
// Route::resource('contact', 'ContactController');


// for moderator
Route::get('/moderatorhome', 'ModeratorController@index')->name('moderatorhome')->middleware('moderator');
Route::get('/moderator', 'ModeratorController@getModerator')->name('moderator')->middleware('moderator');
// Route::get('/moderatorhome', function () {
// 	$data = DB::table('contacts')->paginate(10);
//     return view('moderatorhome', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
// });

// for admin
Route::get('/adminhome', 'AdminController@index')->name('adminhome')->middleware('admin');
Route::get('/admin', 'AdminController@getAdmin')->name('admin')->middleware('admin');
Route::get('/admincreate', 'AdminController@create')->name('admincreate')->middleware('admin');
Route::get('/adminhome/edit/{id}', 'AdminController@edit')->name('adminedit')->middleware('admin');
Route::post('/adminhome/edit/update/{id}', 'AdminController@update')->name('adminupdate')->middleware(('admin'));
Route::get('/adminhome/create', 'AdminController@create')->name('admincreate')->middleware('admin');
Route::post('/adminhome/create/store', 'AdminController@store')->name('adminstore')->middleware('admin');
Route::post('/adminhome/destroy/{id}', 'AdminController@destroy')->name('admindestroy')->middleware('admin');


// for user
Route::get('/userhome', 'UserController@index')->name('userhome')->middleware('user');
Route::get('/user', 'UserController@getUser')->name('user')->middleware('user');
Route::get('/usercreate', 'UserController@create')->name('usercreate')->middleware('user');
Route::get('/userhome/edit/{id}', 'UserController@edit')->name('useredit')->middleware('user');
Route::post('/userhome/edit/update/{id}', 'UserController@update')->name('userupdate')->middleware(('user'));
Route::get('/userhome/create', 'UserController@create')->name('usercreate')->middleware('user');
Route::post('/userhome/create/store', 'UserController@store')->name('userstore')->middleware('user');
Route::post('/userhome/destroy/{id}', 'UserController@destroy')->name('userdestroy')->middleware('user');
