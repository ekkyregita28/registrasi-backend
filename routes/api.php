<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

Route::post('/tracking', 'App\Http\Controllers\Api\AuthController@tracking');
Route::post('/user', 'App\Http\Controllers\Api\UserController@store');
Route::post('/position', 'App\Http\Controllers\Api\PositionController@store');
Route::get('/daerah/{id}', 'App\Http\Controllers\Api\DaerahController@show');
Route::get('/daerah-all', 'App\Http\Controllers\Api\DaerahController@showAll');
Route::get('/daerah', 'App\Http\Controllers\Api\DaerahController@index');
Route::post('/daerah', 'App\Http\Controllers\Api\DaerahController@store');
Route::put('/daerah/{id}', 'App\Http\Controllers\Api\DaerahController@update');
Route::delete('/daerah/{id}', 'App\Http\Controllers\Api\DaerahController@destroy');
Route::get('/daerah/member/{id}' , 'App\Http\Controllers\Api\DaerahController@getAllMemberByDaerah');
Route::get('/daerah/user/{id}' , 'App\Http\Controllers\Api\DaerahController@getAllAdminByDaerah');

// Provinsi
Route::get('/provinsi', 'App\Http\Controllers\Api\ProvinsiController@index');
Route::get('/provinsi/{id}', 'App\Http\Controllers\Api\ProvinsiController@show');
Route::get('/provinsi-all', 'App\Http\Controllers\Api\ProvinsiController@showAll');
Route::post('/provinsi', 'App\Http\Controllers\Api\ProvinsiController@store');
Route::put('/provinsi/{id}', 'App\Http\Controllers\Api\ProvinsiController@update');
Route::delete('/provinsi/{id}', 'App\Http\Controllers\Api\ProvinsiController@destroy');
Route::get('/provinsi/daerah/{id}' , 'App\Http\Controllers\Api\ProvinsiController@getAllDaerah');
Route::get('/provinsi/member/{id}' , 'App\Http\Controllers\Api\ProvinsiController@getAllMemberByProvinsi');
Route::get('/provinsi/user/{id}' , 'App\Http\Controllers\Api\ProvinsiController@getAllAdminByProvinsi');

// Position
Route::get('/position', 'App\Http\Controllers\Api\PositionController@index');
Route::get('/position/{id}', 'App\Http\Controllers\Api\PositionController@show');
Route::get('/position-all', 'App\Http\Controllers\Api\PositionController@showAll');
Route::put('/position/{id}', 'App\Http\Controllers\Api\PositionController@update');
Route::delete('/position/{id}', 'App\Http\Controllers\Api\PositionController@destroy');
Route::get('/position/hak-akses/{id}' , 'App\Http\Controllers\Api\PositionController@getAllHakAkses');
Route::post('/position/hak-akses', 'App\Http\Controllers\Api\PositionController@addNewHakAkses');

// Hak Akses
Route::get('/hak-akses', 'App\Http\Controllers\Api\HakAksesController@index');
Route::get('/hak-akses/{id}', 'App\Http\Controllers\Api\HakAksesController@show');
Route::post('/hak-akses', 'App\Http\Controllers\Api\HakAksesController@store');
Route::put('/hak-akses/{id}', 'App\Http\Controllers\Api\HakAksesController@update');
Route::delete('/hak-akses/{id}', 'App\Http\Controllers\Api\HakAksesController@destroy');
Route::get('/hak-akses/position/{id}' , 'App\Http\Controllers\Api\HakAksesController@getAllPosition');
Route::post('/hak-akses/position', 'App\Http\Controllers\Api\HakAksesController@addNewPosition');

// User
Route::get('user', 'App\Http\Controllers\Api\UserController@index');
Route::get('user/{id}', 'App\Http\Controllers\Api\UserController@show');
        
Route::post('/user/edit', 'App\Http\Controllers\Api\UserController@update');
Route::delete('user/{id}', 'App\Http\Controllers\Api\UserController@destroy');
Route::get('user/member/{id}' ,'App\Http\Controllers\Api\UserController@getAllMember');
Route::get('user/member-regis/{id}' ,'App\Http\Controllers\Api\UserController@getAllMemberRegis');
Route::get('user/member-update/{id}' ,'App\Http\Controllers\Api\UserController@getAllMemberUpdate');
Route::get('user/member-penonaktifan/{id}' ,'App\Http\Controllers\Api\UserController@getAllMemberPenonaktifan');
Route::get('user/member-aktif/{id}' ,'App\Http\Controllers\Api\UserController@getAllMemberAktif');

// VerificationHistory
Route::get('/verification-history', 'App\Http\Controllers\Api\VerificationHistoryController@index');
Route::get('/verification-history/{id}', 'App\Http\Controllers\Api\VerificationHistoryController@show');
Route::post('/verification-history', 'App\Http\Controllers\Api\VerificationHistoryController@store');
Route::put('/verification-history/{id}', 'App\Http\Controllers\Api\VerificationHistoryController@update');
Route::delete('/verification-history/{id}', 'App\Http\Controllers\Api\VerificationHistoryController@destroy');

//registration
Route::get('/registration', 'App\Http\Controllers\Api\RegistrationController@index');
Route::get('/registration/{id}', 'App\Http\Controllers\Api\RegistrationController@show');
Route::post('/registration', 'App\Http\Controllers\Api\RegistrationController@store');
Route::put('/registration/{id}', 'App\Http\Controllers\Api\RegistrationController@update');
Route::delete('/registration/{id}', 'App\Http\Controllers\Api\RegistrationController@destroy');
Route::get('/registration/verification-history/{id}' , 'App\Http\Controllers\Api\RegistrationController@getAllVerifHistory');

//member
Route::get('/member', 'App\Http\Controllers\Api\MemberController@index');
Route::get('/member/{id}', 'App\Http\Controllers\Api\MemberController@show');
Route::post('/member', 'App\Http\Controllers\Api\MemberController@store');
Route::post('/member/edit', 'App\Http\Controllers\Api\MemberController@update');
Route::delete('/member/{id}', 'App\Http\Controllers\Api\MemberController@destroy');
Route::get('/member/verification-history/{id}', 'App\Http\Controllers\Api\MemberController@tracking');
Route::get('/member/ktp/{id}', 'App\Http\Controllers\Api\MemberController@getMemberByKtp');
Route::post('/member/lolos-verifikasi/{id}', 'App\Http\Controllers\Api\MemberController@lolosVerifikasi');
Route::post('/member/nonaktif/{id}', 'App\Http\Controllers\Api\MemberController@nonaktif');
Route::get('/generate-number', 'App\Http\Controllers\Api\AuthController@getRandomNumber');
        
