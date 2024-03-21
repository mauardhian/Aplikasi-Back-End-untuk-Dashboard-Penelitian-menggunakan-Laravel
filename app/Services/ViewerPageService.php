<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;
use App\Models\ViewerPage;
use App\Services\loginSintaService;

class ViewerPageService extends Controller
{
    public static function CreateViewerPage (Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'id_page' => 'required',
            'acces_date' => 'required'
        ]);

        $request = ViewerPage::updateorcreate($validated);

        // return $request;
        return response()->json(['data' => $request]);
    }

    public static function ReadViewerPage (Request $request)
    {
        $request = ViewerPage::all();

        // return $request;
        return response()->json(['data' => $request]);
    }

    public static function UpdateViewerPage (Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'id_page' => 'required',
            'acces_date' => 'required'
        ]);

        $request = ViewerPage::updateorcreate($validated);

        // return $request;
        return response()->json(['data' => $request]);
    }

    public static function DeleteViewerPage (Request $request)
    {
        $request = $request->validate([
            'id' => 'required'
        ]);
        $find = ViewerPage::where($request)->delete();
        // $delete = ViewerPage::$find()->delete();

        // return $request;
        return response()->json(['data' => $request]);
    }
}