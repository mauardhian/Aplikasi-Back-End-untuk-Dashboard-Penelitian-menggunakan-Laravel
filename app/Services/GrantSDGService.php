<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ContactUs;

class GrantSDGService{

    public function getAllGrantSDG(){
        try {

            $grantsdg = GrantSDG::with('grant')->get();

            return response()->json(
                [
                    'message' => 'grant sdg retrieved successfully',
                    'status' => true,
                    'data' => $grantsdg
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve grant sdg',
                    'status' => false,
                    'error' => $e->getMessage(),
                ], 200
            );
        }
    }

    public function insertGrantSDG(Request $request){

        try{
            $request->validate([
                'id_grant_category'     =>  'required',
                'id_grant'              =>  'required',
                'id_SDGs'               => 'required'
            ]);

            GrantSDG::create([
                'id_grant_category'         => $request->id_grant_category,
                'id_grant'                  => $request->id_grant,
                'id_SDGs'                   => $request->id_SDGs
            ]);
            return response()->json([
                'message' => 'grant sdg added successfully',
                'status' => true,
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to add the grant sdg',
                'status' => false,
                'error' => $e->getMessage()], 500);
        }
    }

    public function updateGrantSDG(Request $request,$id){
        try {
            $request->validate([
                'id_grant_category'     =>  'required',
                'id_grant'              =>  'required',
                'id_SDGs'               =>  'required'
            ]);

            $grantsdg = GrantSDG::findOrFail($id);
            $grantsdg->update([
                'id_grant_category'         => $request->id_grant_category,
                'id_grant'                  => $request->id_grant,
                'id_SDGs'                   => $request->id_SDGs
            ]);
            return response()->json([
                'message' => 'grant sdg updated successfully',
                'status' => true,
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to update the grant sdg',
                'status' => false,
                'error' => $e->getMessage()], 500);
        }
    }

    public function deleteGrantSDG($id)
    {
        try {
            $grantsdg = GrantSDG::findOrFail($id);
            $grantsdg->delete();
            return response()->json([
                'message' => 'grant sdg deleted successfully',
                'status' => true,
            ], 202);
        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to delete the grant sdg',
                'status' => false,
                'error' => $e->getMessage()], 404);
        }
    }

}