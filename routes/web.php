<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Layout\MainController;
use App\Http\Controllers\Login\LoginController;


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

Route::get('401', function () {
    return view('error/401');
});

#Route::get('404', function () {
#    return view('error/404');
#});

#Route::group(['namespace' => 'App\Http\Controllers\layouts'], function()
#{
#    Route::get('/', ['MainController', 'index']);
#});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {    
    Route::get('/logout', [LoginController::class, 'logout']);    
    Route::get('/home', [MainController::class, 'index']);
        
    Route::group(['middleware' => ['auth', 'checkLink:menu']], function () {
        #Route::resource('/menu', 'App\Http\Controllers\Menu\MenuController');
        Route::get('/menu', 'App\Http\Controllers\Menu\MenuController@index');
        Route::get('/menu/create', 'App\Http\Controllers\Menu\MenuController@create');
        Route::post('/menu', 'App\Http\Controllers\Menu\MenuController@store');
        Route::get('/menu/edit/{menu}', 'App\Http\Controllers\Menu\MenuController@edit');
        Route::patch('/menu/{menu}', 'App\Http\Controllers\Menu\MenuController@update');
        Route::delete('/menu/{menu}', 'App\Http\Controllers\Menu\MenuController@delete');
        Route::get('/menu/{menu}', 'App\Http\Controllers\Menu\MenuController@show');
    });
    
    Route::group(['middleware' => ['auth', 'checkLink:role']], function () {
        Route::resource('/role', 'App\Http\Controllers\Role\RoleController');
    });
    
    Route::group(['middleware' => ['auth', 'checkLink:menurole']], function () {
        Route::resource('/menurole', 'App\Http\Controllers\Menurole\MenuroleController');
    });
    
    Route::group(['middleware' => ['auth', 'checkLink:user']], function () {
        Route::resource('/user', 'App\Http\Controllers\user\UserController');
    });
    
    Route::group(['middleware' => ['auth', 'checkLink:userrole']], function () {
        Route::resource('/userrole', 'App\Http\Controllers\Userrole\UserroleController');
    });
    
    Route::group(['middleware' => ['auth', 'checkLink:mmot']], function () {
        Route::resource('/mmot', 'App\Http\Controllers\Mot\MotController');
    });
    
    Route::group(['middleware' => ['auth', 'checkLink:mtparmada']], function () {
        Route::resource('/mtparmada', 'App\Http\Controllers\Mtparmada\MtparmadaController');
    });
});
#Route::get('/', [MainController::class, 'index']);