<?php

use App\Http\Controllers\DeleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\UpdateController;

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
Route::put('articleCatrgoryMapping/updateArticleCategoryMapping', [UpdateController::class, 'updateArticleCategoryMapping']);
Route::put('article/updateArticle', [UpdateController::class, 'updateArticle']);
Route::put('contactUs/updateContactUs', [UpdateController::class, 'updateContactUs']);
Route::put('contentCategory/updateContentCategory', [UpdateController::class, 'updateContentCategory']);
Route::put('grantFundsEksternal/updateGarudaFundsEksternal', [UpdateController::class, 'updateGarudaFundsEksternal']);
Route::put('grantSDG/updateGrantSDG', [UpdateController::class, 'updateGrantSDG']);
Route::put('product/updateProduct', [UpdateController::class, 'updateProduct']);
Route::put('sdg/updateSDG', [UpdateController::class, 'updateSDG']);
Route::put('userLog/updateUserLog', [UpdateController::class, 'updateUserLog']);
Route::put('userPriviledge/updateUserPriviledge', [UpdateController::class, 'updateUserPriviledge']);
Route::put('viewerLecture/updateViewerLecture', [UpdateController::class, 'updateViewerLecture']);
Route::put('viewerPage/updateViewerPage', [UpdateController::class, 'updateViewerPage']);
Route::put('webPage/updateWebPage', [UpdateController::class, 'updateWebPage']);

Route::delete('articleCategoryMapping/deleteArticleCategoryMapping', [DeleteController::class, 'deleteArticleCategoryMapping']);
Route::delete('article/deleteArticle', [DeleteController::class, 'deleteArticle']);
Route::delete('contactUs/deleteContactUs', [DeleteController::class, 'deleteContactUs']);
Route::delete('contentCategory/deleteContentCategory', [DeleteController::class, 'deleteContentCategory']);
Route::delete('grantFundsEksternal/deleteGarudaFundsEksternal', [DeleteController::class, 'deleteGarudaFundsEksternal']);
Route::delete('grantSDG/deleteGrantSDG', [DeleteController::class, 'deleteGrantSDG']);
Route::delete('product/deleteProduct', [DeleteController::class, 'deleteProduct']);
Route::delete('sdg/deleteSDG', [DeleteController::class, 'deleteSDG']);
Route::delete('userLog/deleteUserLog', [DeleteController::class, 'deleteUserLog']);
Route::delete('userPriviledge/deleteUserPriviledge', [DeleteController::class, 'deleteUserPriviledge']);
Route::delete('viewerLecture/deleteViewerLecture', [DeleteController::class, 'deleteViewerLecture']);
Route::delete('viewerPage/deleteViewerPage', [DeleteController::class, 'deleteViewerPage']);
Route::delete('webPage/deleteWebPage', [DeleteController::class, 'deleteWebPage']);

Route::post('getAllArticleCategoryMapping', [ReadController::class, 'getAllArticleCategoryMapping']);
Route::post('getAllArticle', [ReadController::class, 'getAllArticle']);
Route::post('getAuthorBookDoc', [ReadController::class, 'getAuthorBookDoc']);
Route::post('getAuthorComServiceDoc', [ReadController::class, 'getAuthorComServiceDoc']);
Route::post('getAuthorGoogle', [ReadController::class, 'getAuthorGoogle']);
Route::post('getAllContactUs', [ReadController::class, 'getAllContactUs']);
Route::post('getAuthorComServiceDoc', [ReadController::class, 'getAuthorComServiceDoc']);
Route::post('getAllContactUs', [ReadController::class, 'getAllContactUs']);
Route::post('getDaftarAfiliasi', [ReadController::class, 'getDaftarAfiliasi']);
Route::post('GetDaftarAuthor', [ReadController::class, 'GetDaftarAuthor']);
Route::post('getDaftarJurnal', [ReadController::class, 'getDaftarJurnal']);
Route::post('getAuthorGarudaDoc', [ReadController::class, 'getAuthorGarudaDoc']);
Route::post('getAuthorGoogle', [ReadController::class, 'getAuthorGoogle']);
Route::post('getAllGrantFundsEksternal', [ReadController::class, 'getAllGrantFundsEksternal']);
Route::post('getAllGrantSDG', [ReadController::class, 'getAllGrantSDG']);
Route::post('getAuthorIpr', [ReadController::class, 'getAuthorIpr']);
Route::post('LoginSinta', [ReadController::class, 'LoginSinta']);
Route::post('getAllProduct', [ReadController::class, 'getAllProduct']);
Route::post('getAuthorResearchDoc', [ReadController::class, 'getAuthorResearchDoc']);
Route::post('getAllSDG', [ReadController::class, 'getAllSDG']);
Route::post('getAllUserLog', [ReadController::class, 'getAllUserLog']);
Route::post('getAllUserPriviledge', [ReadController::class, 'getAllUserPriviledge']);
Route::post('getAllViewerService', [ReadController::class, 'getAllViewerService']);
Route::post('ReadViewerPage', [ReadController::class, 'ReadViewerPage']);
Route::post('getAllWebPage', [ReadController::class, 'getAllWebPage']);
Route::post('getAuthorWosDoc', [ReadController::class, 'getAuthorWosDoc']);


Route::post('updateArticleCategoryMapping', [UpdateController::class, 'updateArticleCategoryMapping']);
Route::post('updateArticle', [UpdateController::class, 'updateArticle']);
Route::post('updateContactUs', [UpdateController::class, 'updateContactUs']);
Route::post('updateContentCategory', [UpdateController::class, 'updateContentCategory']);
Route::post('updateGrandFundsEksternal', [UpdateController::class, 'updateGrandFundsEksternal']);
Route::post('updateGrantSDG', [UpdateController::class, 'updateGrantSDG']);
Route::post('updateProduct', [UpdateController::class, 'updateProduct']);
Route::post('updateSDG', [UpdateController::class, 'updateSDG']);
Route::post('updateUserLog', [UpdateController::class, 'updateUserLog']);
Route::post('updateUserPriviledge', [UpdateController::class, 'updateUserPriviledge']);
Route::post('updateViewerLecture', [UpdateController::class, 'updateViewerLecture']);
Route::post('UpdateViewerPage', [UpdateController::class, 'UpdateViewerPage']);
Route::post('updateWebPage', [UpdateController::class, 'updateWebPage']);