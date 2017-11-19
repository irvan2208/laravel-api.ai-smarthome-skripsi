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



// Route::get('/', function () {
//     if (Auth::check()) {
//         if (Auth::user()->hasRole('admin')) {
//             return redirect()->route('admin.dashboard');
//         }
//     } else {
//         return view('welcome');
//     }
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'VoiceController@test')->name('test');

Route::resource('admin/user', 'UserController');
Route::resource('admin/home', 'HomeController');

Route::post('admin/user/lists', 'UserController@dataTable')->name('users.list');
Route::post('admin/home/lists', 'HomeController@dataTable')->name('homes.list');


Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');

    // DataTable Routes
});