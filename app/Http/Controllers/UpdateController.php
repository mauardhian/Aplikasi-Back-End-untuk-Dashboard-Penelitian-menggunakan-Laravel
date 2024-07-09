<?php

namespace App\Http\Controllers;

use App\Models\GrantSDG;
use App\Services\ArticleCategoryMappingService;
use App\Services\ArticleService;
use App\Services\ContactUsService;
use App\Services\ContentCategoryService;
use App\Services\GrantFundsEksternalService;
use App\Services\ProductService;
use App\Services\SDGService;
use App\Services\UserLogController;
use App\Services\UserPriviledgeService;
use App\Services\ViewerLectureService;
use App\Services\WebPageController;
use Illuminate\Http\Request;
use App\Services;

class UpdateController extends Controller
{
    public static function updateArticleCategoryMapping(Request $request){
        $updateArticleCategoryMapping = ArticleCategoryMappingService::updateArticleCategoryMapping();
        return $request;
    }

    public static function updateArticle(Request $request){
        $updateArticle = ArticleService::updateArticle();
        return $request;
    }

    public static function updateContactUs(Request $request){
        $updateContactUs = ContactUsService::updateContactUs();
        return $request;
    }

    public static function updateContentCategory(Request $request){
        $updateContentCategory = ContentCategoryService::updateContentCategory();
        return $request;
    }

    public static function updateGrandFundsEksternal(Request $request){
        $updateGrandFundsEksternal = GrantFundsEksternalService::updateGrandFundsEksternal();
        return $request;
    }

    public static function updateGrantSDG(Request $request){
        $updateGrantSDG = GrantSDG::updateGrantSDG();
        return $request;
    }

    public static function updateProduct(Request $request){
        $updateProduct = ProductService::updateProduct();
        return $request;
    }

    public static function updateSDG(Request $request,$id){
        $updateSDG = SDGService::updateSDG();
        return $request;
    }

    public static function updateUserLog(Request $request){
        $updateUserLog = UserLogController::updateUserLog();
        return $request;
    }

    public static function updateUserPriviledge(Request $request){
        $updateUserPriviledge = UserPriviledgeService::updateUserPriviledge();
        return $request;
    }

    public static function updateViewerLecture(Request $request){
        $updateViewerLecture = ViewerLectureService::updateViewerLecture();
        return $request;
    }

    public static function UpdateViewerPage (Request $request){
        $UpdateViewerPage = ViewerPageService::UpdateViewerPage();
        return $request;
    }

    public static function updateWebPage(Request $request){
        $updateWebPage = WebPageController::updateWebPage();
        return $request;
    }



}
