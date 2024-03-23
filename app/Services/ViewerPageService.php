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
       try{
        $validated = $request->validate([
            'id' => 'required',
            'id_page' => 'required',
            'acces_date' => 'required'
        ]);

        $request = ViewerPage::updateorcreate($validated);

        // return $request;
        return response()->json([
            'message' => 'Viewer page create successfully',
            'status' => true,
            'data' => $request
        ],200
        );
       }
       catch (\Throwable $th){
        return response()->json([
            'message' => 'Failed to create viewer page ',
            'status' => false,
            'error' => $th->getMessage(),
        ],500
        );
        } 
    }

    public static function ReadViewerPage (Request $request)
    {
        try{
            $request = ViewerPage::all();

            // return $request;
            return response()->json([
                'message' => 'Viewer page retrieved successfully',
                'status' => true,
                'data' => $request
            ],200
            );        
        }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to retrieved viewer page ',
                'status' => false,
                'error' => $th->getMessage(),
            ],200
            );
            }
    }

    public static function UpdateViewerPage (Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required',
                'id_page' => 'required',
                'acces_date' => 'required'
            ]);
    
            $request = ViewerPage::updateorcreate($validated);
    
            // return $request;
            return response()->json([
                'message' => 'Viewer page update successfully',
                'status' => true,
                'data' => $request
            ],200
            );  
        }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to update viewer page ',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

    public static function DeleteViewerPage (Request $request)
    {
        try{
            $request = $request->validate([
                'id' => 'required'
            ]);
            $find = ViewerPage::where($request)->delete();
            // $delete = ViewerPage::$find()->delete();
    
            // return $request;
            return response()->json([
                'message' => 'Viewer page delete successfully',
                'status' => true,
                'data' => $request
            ],200
            );          }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to delete viewer page ',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }
}