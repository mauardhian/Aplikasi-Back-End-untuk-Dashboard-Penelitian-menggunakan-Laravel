<?php

namespace App\Http\Controllers;

use App\Models\daftar_afiliasi;
use App\Models\daftar_jurnal;
use App\Models\Doc\googleDoc;
use App\Models\Doc\iprDoc;
use App\Models\Doc\ScopusDoc;
use App\Models\Sinta_Daftar_Author;
use App\Models\Doc\WosDoc;
use App\Models\Doc\garudaDoc;
use App\Models\Doc\bookDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use App\Services;


class ReadController extends Controller
{
    public static function getAllArticleCategoryMapping(Request $request){
        $getAllArticleCategoryMapping = ArticleCategoryMapping::getAllArticleCategoryMapping();
        return $request;
    }

    public static function getAllArticle(Request $request){
        $getAllArticle = ArticleService::getAllArticle();
        return $request;
    }

    public static function getAuthorBookDoc(Request $request){
        $getAuthorBookDoc = BookDocService::getAuthorBookDoc();
        return $request;
    }

    public static function getAuthorComServiceDoc(Request $request){
        $getAuthorComServiceDoc = ComServiceDocService::getAuthorComServiceDoc();
        return $request;
    }

    public static function getAllContactUs(Request $request){
        $getAllContactUs = ContactUsService::getAllContactUs();
        return $request;
    }

    public static function getAllContentCategories(Request $request){
        $getAllContentCategories = ContentCategoryService::getAllContentCategories();
        return $request;
    }

    public static function getDaftarAfiliasi(Request $request){
        $getDaftarAfiliasi = DaftarAfiliasiService::getDaftarAfiliasi();
        return $request;
    }

    public static function GetDaftarAuthor(Request $request){
        $GetDaftarAuthor = DaftarAuthorService::GetDaftarAuthor();
        return $request;
    }
    
    public static function getDaftarJurnal(Request $request){
        $getDaftarJurnal = DaftarJurnalService::getDaftarJurnal();
        return $request;
    }

    public static function getAuthorGarudaDoc(Request $request){
        $getAuthorGarudaDoc = GarudaDocService::getAuthorGarudaDoc();
        return $request;
    }

    public static function getAuthorGoogle(Request $request){
        $getAuthorGoogle = GoogleDocService::getAuthorGoogle();
        return $request;
    }

    public static function getAllGrantFundsEksternal(Request $request){
        $getAllGrantFundsEksternal = GrantFundsEksternalService::getAllGrantFundsEksternal();
        return $request;
    }

    public static function getAllGrantSDG(Request $request){
        $getAllGrantSDG = GrantSDGService::getAllGrantSDG();
        return $request;
    }

    public static function getAuthorIpr(Request $request){
        $getAuthorIpr = IprDocService::getAuthorIpr();
        return $request;
    }

    public static function LoginSinta(Request $request) {
        $LoginSinta = LoginSintaService::LoginSinta();
        return $request;
    }

    public static function getAllProduct(Request $request){
        $getAllProduct = ProductService::getAllProduct();
        return $request;
    }
    
    public static function getAuthorResearchDoc(Request $request){
        $getAuthorResearchDoc = ResearchDocService::getAuthorResearchDoc();
        return $request;
    }
    public static function getAuthorScopusDoc(Request $request){
        $getAuthorScopusDoc = ScopusDocService::getAuthorScopusDoc();
        return $request;
    }

    public static function getAllSDG(Request $request){
        $getAllSDG = SDGService::getAllSDG();
        return $request;
    }

    public static function getAllUserLog(Request $request){
        $getAllUserLog = UserLogController::getAllUserLog();
        return $request;
    }

    public static function getAllUserPriviledge(Request $request){
        $getAllUserPriviledge = UserPriviledgeService::getAllUserPriviledge();
        return $request;
    }

    public static function getAllViewerService(Request $request){
        $getAllViewerService = ViewerPageService::ReadViewerPage();
        return $request;
    }

    public static function ReadViewerPage (Request $request){
        $ReadViewerPage = ViewerPageService::ReadViewerPage();
        return $request;
    }

    public static function getAllWebPage(Request $request){
        $getAllWebPage = WebPageController::getAllWebPage();
        return $request;
    }

    public static function getAuthorWosDoc (Request $request){
        $getAuthorWosDoc = WosDocService::getAuthorWosDoc();
        return $request;
    }


}
