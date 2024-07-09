<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SDG;

class SDGService{
    public function getAllSDG(){
        try {

            $sdg = SDG::all();

            return response()->json(
                [
                    'message' => 'SDG retrieved successfully',
                    'status' => true,
                    'data' => $sdg
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve SDG',
                    'status' => false,
                    'error' => $e->getMessage(),
                ], 200
            );
        }
    }

    public function insertSDG(Request $request){

        try{
            $request->validate([
                'name'          =>  'required',
            ]);

            SDG::create([
                'name'          => $request->name,
            ]);

            return response()->json([
                'message' => 'SDG added successfully',
                'status' => true,
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to add the SDG',
                'status' => false,
                'error' => $e->getMessage()], 500);
        }
    }

    public static function updateSDG(Request $request,$id){
        try {
            $request->validate([
                'name'          =>  'required',
            ]);

            $sdg = SDG::findOrFail($id);
            $sdg->update([
                'name'          => $request->name,
            ]);

            return response()->json([
                'message' => 'SDG updated successfully',
                'status' => true,
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to update the SDG',
                'status' => false,
                'error' => $e->getMessage()], 500);
        }
    }

    public static function deleteSDG($id)
    {
        try {
            $sdg = SDG::findOrFail($id);
            $sdg->delete();
            return response()->json([
                'message' => 'SDG deleted successfully',
                'status' => true,
            ], 202);
        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to delete the SDG',
                'status' => false,
                'error' => $e->getMessage()], 404);
        }
    }
}
