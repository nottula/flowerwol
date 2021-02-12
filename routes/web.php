<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Route::get('/verifica_contatto/{$number}', 'verificaTelefonica@checkNumero')->name('verificaTelefonica');


Route::get('/verificaContatto/{number}','verificaTelefonica@checkNumero')->name('verificaTelefonica');
Route::get('/verificaPc/{id}','verificaTelefonica@checkPc')->name('verificaTelefonica');
Route::get('/verificaPcWeb/{id}','verificaTelefonica@checkPcWeb')->name('verificaTelefonica_Web');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/user', 'UserController@index')->name('user');
Route::get('/userlist','UserListController@index')->name('userlist');
Route::get('/changePassword/{id}','UserListController@changePassword')->name('changePassword');
Route::get('/removeUser/{id}','UserListController@removeUser')->name('removeUser');
Route::get('/createUser','UserListController@createUser')->name('createUser');
Route::post('/saveUser','UserListController@saveUser')->name('saveUser');
Route::post('/savePass','UserListController@savePass')->name('savePass');
route::get('/computer','ComputerList@index')->name('computer');
Route::get('/eliminaPc/{id}', 'ComputerList@remove')->name('removePc');
Route::get('/inserisciPc', 'ComputerList@inserisciPc')->name('inserisciPc');
Route::post('/savePc', 'ComputerList@savePc')->name('savePc');
