<?php

namespace App\Http\Controllers;

use App\Models\User_Map;
use Illuminate\Http\Request;
use App\Models\UserPriviledge;
use App\Models\User;
use App\Models\UserPriviledgeMapping; 
use Illuminate\Support\Facades\DB;

class UserPriviledgeMappingService extends Controller
{
    
    public static function CreateUserPriviledgeMapping (Request $request)
    {
       try{
        $create = $request->validate([
            'id' => 'required',
            'id_user' => 'required',
            'id_priviledge' => 'required'
        ]);

        $create = UserPriviledgeMapping::create($create);

        return response()->json([
            'message' => 'User Priviledge Mapping create successfully',
            'status' => true,
        ],200
        );
       }
       catch (\Throwable $th){
        return response()->json([
            'message' => 'Failed to create User Priviledge Mapping ',
            'status' => false,
            'error' => $th->getMessage(),
        ],500
        );
        } 
    }

    public static function ReadUserPriviledgeMapping (Request $request)
    {
        try{
            $read = DB::table('User_Map')
            ->leftJoin('user_priviledge_mapping', 'User_Map.id', '=', 'user_priviledge_mapping.id_user')
            ->leftJoin('user_priviledge', 'user_priviledge_mapping.id_priviledge', '=', 'user_priviledge.id')
            ->select('User_Map.*',
                    'user_priviledge.name as user_priviledge_name', 
                    'user_priviledge_mapping.id as mapping_id', 
                    'user_priviledge_mapping.id_user as mapping_user_id',
                    'user_priviledge_mapping.id_priviledge as mapping_priviledge_id')
            ->get();

            // return $request;
            return response()->json([
                'message' => 'User Priviledge Mapping retrieved successfully',
                'status' => true,
                'data' => $read
            ],200
            );        
        }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to retrieved User Priviledge Mapping ',
                'status' => false,
                'error' => $th->getMessage(),
            ],200
            );
            }
    }

    public static function UpdateUserPriviledgeMapping (Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required',
                'id_user' => 'required',
                'id_priviledge' => 'required'
            ]);
    
            $validated = UserPriviledgeMapping::updateorcreate($validated);
    
            // return $request;
            return response()->json([
                'message' => 'User Priviledge Mapping update successfully',
                'status' => true,
            ],200
            );  
        }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to update User Priviledge Mapping ',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

    public static function DeleteUserPriviledgeMapping (Request $request)
    {
        try{
            $delete = $request->validate([
                'id' => 'required'
            ]);
            $delete = UserPriviledgeMapping::where($delete)->delete();
    
            // return $request;
            return response()->json([
                'message' => 'User Priviledge Mapping delete successfully',
                'status' => true,
            ],200
            );          }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to delete User Priviledge Mapping ',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

}
