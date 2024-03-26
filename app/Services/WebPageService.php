<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\WebPage;

class WebPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllWebPage()
    {
        //
        try {
            $data = WebPage::orderBy('id', 'asc')->get();
            return response()->json([
                'status'=> true,
                'message'=>'All Web Page find',
                'data' => $data
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Failed to get all Web Page',
                'error' => $th->getMessage()], 500);
        }

    }

    public function getWebPageById(string $id){
        try{
            $data = WebPage::findOrFail($id);
            return response()->json([
                'status'=>true,
                'message'=>'Web Page found',
                'data'=>$data
            ],200);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Web Page not found',
                'error' => $th->getMessage()], 500);
        }

    }

    public static function createWebPage(Request $req)
    {
        try {
            $data = new WebPage;
            $data-> page_name = $req->page_name;
            $data->save();
            return response()->json([
                'status' => true,
                'message' => 'Web page successfully created',
                'data' => $data
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Create web page failed',
                'error' => $th->getMessage()], 500);
        }
    }

    public static function updateWebPage(Request $req, string $id)
    {
        try {
            $data = WebPage::findorFail($id);
            $data-> page_name = $req->page_name;
            $data->save();
            return response()->json([
                'status'=>true,
                'message'=>'Web page successfully updated',
                'data' => $data
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Update web page failed',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public static function deleteWebPage(string $id)
    {
        try {
            $data = WebPage::findorFail($id);
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Web page deleted'
            ], 200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Delete web page failed',
                'error' => $th->getMessage()], 500);
        }
    }
}