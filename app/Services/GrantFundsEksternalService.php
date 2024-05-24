<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\GrantFundsEksternal;

class GrantFundsEksternalService{
    public function getAllGrantFundsEksternal()
    {
        //
        try {
            $data = GrandFundsEksternal::orderBy('id', 'asc')->get();
            return response()->json([
                'status'=>true,
                'message'=> 'All Grand Funds Eksternal found',
                'data' => $data
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'failed to get All Grand Funds Eksternal',
                'error' => $th->getMessage()], 500);
        }

    }

    public function getGrantFundsEksternalById(string $id){
        try{
            $data=GrandFundsEksternal::findOrFail($id);
            return response()->json([
                'status'=>true,
                'message'=>'Grand fund eksternal found',
                'data'=>$data
            ],200);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Grand fund eksternal not found',
                'error' => $th->getMessage()], 500);
        }

    }

    public static function createGrantFundsEksternal(Request $req)
    {
        try {
            $data = new GrandFundsEksternal;
            $data->id_grant_category = $req->id_grant_category;
            $data->grant_id = $req->grant_id;
            $data->collaborator_name = $req->collaborator_name;
            $data->collaborator_category_id = $req->collaborator_category_id;
            $data->funds_approved = $req->funds_approved;
            $data->funds_category = $req->funds_category;
            $data->funds_program_name = $req->funds_program_name;
            
            $data->save();
            return response()->json([
                'status' => true,
                'message' => 'grand funds eksternal successfully created',
                'data' => $data
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'create grant funds eksternal failed',
                'error' => $th->getMessage()], 500);
        }
    }

    public static function updateGrandFundsEksternal(Request $req, string $id)
    {
        try {
            $data = GrandFundsEksternal::findorFail($id);
            $data->id_grant_category = $req->id_grant_category;
            $data->grant_id = $req->grant_id;
            $data->collaborator_name = $req->collaborator_name;
            $data->collaborator_category_id = $req->collaborator_category_id;
            $data->funds_approved = $req->funds_approved;
            $data->funds_category = $req->funds_category;
            $data->funds_program_name = $req->funds_program_name;

            $data->save();
            return response()->json([
                'status'=>true,
                'message'=>'grand funds eksternal successfully updated',
                'data' => $data
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' =>false,
                'message' => 'update grand funds eksternal failed',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public static function deleteGrandFundsEksternal(string $id)
    {
        try {
            $data = GrandFundsEksternal::findorFail($id);
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'grand funds eksternal deleted'
            ], 200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'delete grand funds eksternal failed',
                'error' => $th->getMessage()], 500);
        }
    }
}
