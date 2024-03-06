<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('GetScopusDoc', [ReadController::class, 'getScopusDoc'])->middleware(['auth:api','scope:old-pegawai']);

Route::post('GetScopusDoc', [ReadController::class, 'getScopusDoc']);
Route::post('getAuthorScopusDoc', [ReadController::class, 'getAuthorScopusDoc']);
Route::post('LoginSinta', [ReadController::class, 'loginSinta']);
//Author
Route::post('getDaftarAuthor', [ReadController::class, 'getDaftarAuthor']);
Route::post('getDaftarAfiliasi', [ReadController::class, 'getDaftarAfiliasi']);
Route::post('getAuthorWosDoc', [ReadController::class, 'getAuthorWosDoc']);
Route::post('getAuthorGaruda', [ReadController::class, 'getAuthorGaruda']);
Route::post('getAuthorGoogle', [ReadController::class, 'getAuthorGoogle']);
Route::post('getAuthorResearch', [ReadController::class, 'getAuthorResearch']);
Route::post('getAuthorIpr', [ReadController::class, 'getAuthorIpr']);
Route::post('getAuthorBookDoc', [ReadController::class, 'getAuthorBookDoc']);
Route::post('getAuthorComServiceDoc', [ReadController::class, 'getAuthorComServiceDoc']);
Route::post('getDaftarJurnal', [ReadController::class, 'getDaftarJurnal']);
//Afiliasi
// Route::post('getAfiliasiScopusDoc', [ReadController::class, 'getAfiliasiScopusDoc']);
