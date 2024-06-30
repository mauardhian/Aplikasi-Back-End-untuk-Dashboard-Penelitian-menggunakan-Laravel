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

class DeleteController
{
    public function deleteArticleCategoryMapping(Request $request)
    {
        return ArticleCategoryMappingService::deleteArticleCategoryMapping($request);
    }

    public function deleteArticle(Request $request)
    {
        return ArticleService::deleteArticle($request);
    }

    public function deleteContactUs(Request $request)
    {
        return ProductService::deleteContactUs($request->id);
    }

    public function deleteContentCategory(Request $request)
    {
        return ContentCategoryService::deleteContentCategory($request);
    }

    public function deleteGarudaFundsEksternal(Request $request)
    {
        return GrantFundsEksternalService::deleteGrandFundsEksternal($request->id);
    }

    public function deleteGrantSDG(Request $request)
    {
        return GrantSDGService::deleteGrantSDG($request->id);
    }

    public function deleteProduct(Request $request)
    {
        return ProductService::deleteProduct($request->id);
    }

    public function deleteSDG(Request $request)
    {
        return SDGService::deleteSDG($request->id);
    }

    public function deleteUserLog(Request $request)
    {
        return UserLogController::deleteUserLog($request->id);
    }

    public function deleteUserPriviledge(Request $request)
    {
        return UserPriviledgeService::deleteUserPriviledge($request->id);
    }

    public function deleteViewerLecture(Request $request)
    {
        return ViewerLectureService::deleteViewerLecture($request->id);
    }

    public function deleteViewerPage(Request $request)
    {
        return ViewerPageService::deleteViewerPage($request->id);
    }

    public function deleteWebPage(Request $request)
    {
        return WebPageController::deleteWebPage($request->id);
    }
}