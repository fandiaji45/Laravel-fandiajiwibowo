<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'AuthController@login');

///consume token 
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function(){
     // manggil controller sesuai bawaan laravel 8
    Route::post('logout',[AuthController::class, 'logout']);
     // manggil controller dengan mengubah namespace di RouteServiceProvider.php biar bisa kayak versi2 sebelumnya
    Route::post('logoutall', 'AuthController@logoutall');
    Route::post('profile', 'ProfileUser@profile');
    Route::post('updateprofile', 'ProfileUser@updateprofile');

    
});
//end 

Route::post('registerform', 'UserController@registerform');
Route::post('registerformadmin', 'UserController@registerformadmin');
Route::post('inviteuser', 'InviteController@inviteuser');
Route::post('activationuseremail', 'ActivationUserEmail@activationuseremail');
