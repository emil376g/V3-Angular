<?php
header("Access-Control-Allow-Origin: *");
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Use App\Notes;
Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });
Auth::guard('api')->user(); // instance of the logged user
Auth::guard('api')->check(); // if a user is authenticated
Auth::guard('api')->id(); // the id of the authenticated user
    Route::get('notes/{UserID}', 'NotesController@index');
    Route::get('notes/{UserID}/{Notes}', 'NotesController@show');
    Route::post('notes', 'NotesController@store');
    Route::put('notes/{note}', 'NotesController@update');
    Route::delete('notes/{Notes}', 'NotesController@delete');
    Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');