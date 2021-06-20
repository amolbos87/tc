<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController as ApiAuthController;
use App\Http\Controllers\API\UserController as UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::group(['prefix'=>'accounts','as'=>'account.'], function(){
//     Route::get('/', ['as' => 'index', 'uses' => 'AccountController@index']);
//     Route::get('connect', ['as' => 'connect', 'uses' = > 'AccountController@connect']);
// });

// Route::get('/sample','Auth\ApiAuthController@sample')->name('register.sample');

// Route::get('sample', ['as' => 'sample', 'uses' => 'Auth\ApiAuthController@sample']);
// Route::get('/v1/samplexx', [ApiAuthController::class, 'sample'])->name('samplexx');



Route::group(['prefix' => 'v1', 'middleware'=> ['cors','json.response']], function() {
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register');
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'v1', 'middleware'=> 'auth:api'], function() {
    // Route::post('/user', [UserController::class, 'index'])->name('user');
    // Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    // Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    // Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::apiResource('user', UserController::class);
});



// Route::post('register', [AuthenticateController::class, 'register']);

// Route::post('login', [AuthenticateController::class, 'login']);