<?php

namespace App\Http\Controllers;

use App\Services\ArticleCategoryMappingService;
use App\Services\ArticleService;
use App\Services\ContentCategoryService;
use App\Services\GrantFundsEksternalService;
use App\Services\GrantSDGService;
use App\Services\ProductService;
use App\Services\SDGService;
use App\Services\UserLogController;
use App\Services\UserPriviledgeService;
use App\Services\ViewerLectureService;
use App\Services\WebPageController;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function updateArticleCategoryMapping(Request $request)
    {
        return ArticleCategoryMappingService::updateArticleCategoryMapping($request);
    }

    public function updateArticle(Request $request)
    {
        return ArticleService::updateArticle($request, $request->id);
    }

    public function updateContactUs(Request $request)
    {
        return ProductService::updateContactUs($request, $request->id);
    }

    public function updateContentCategory(Request $request)
    {
        return ContentCategoryService::updateContentCategory($request);
    }

    public function updateGarudaFundsEksternal(Request $request)
    {
        return GrantFundsEksternalService::updateGrandFundsEksternal($request, $request->id);
    }

    public function updateGrantSDG(Request $request)
    {
        return GrantSDGService::updateGrantSDG($request, $request->id);
    }

    public function updateProduct(Request $request)
    {
        return ProductService::updateProduct($request, $request->id);
    }

    public function updateSDG(Request $request)
    {
        return SDGService::updateSDG($request, $request->id);
    }

    public function updateUserLog(Request $request)
    {
        return UserLogController::updateUserLog($request, $request->id);
    }

    public function updateUserPriviledge(Request $request)
    {
        return UserPriviledgeService::updateUserPriviledge($request);
    }

    public function updateViewerLecture(Request $request)
    {
        return ViewerLectureService::updateViewerLecture($request);
    }

    public function updateViewerPage(Request $request)
    {
        return ViewerPageService::UpdateViewerPage($request);
    }

    public function updateWebPage(Request $request)
    {
        return WebPageController::updateWebPage($request, $request->id);
    }


}
