<?php

namespace App\Services;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPriviledge;

class UserPriviledgeService extends Controller
{
    
    public static function CreateUserPriviledge (Request $request)
    {
       try{
        $create = $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $create = UserPriviledge::create($create);

        return response()->json([
            'message' => 'User Priviledge  create successfully',
            'status' => true,
        ],200
        );
       }
       catch (\Throwable $th){
        return response()->json([
            'message' => 'Failed to create User Priviledge  ',
            'status' => false,
            'error' => $th->getMessage(),
        ],500
        );
        } 
    }

    public static function ReadUserPriviledge (Request $request)
    {
        try{
            $read = UserPriviledge::all();

            return response()->json([
                'message' => 'User priviledge retrieved successfully',
                'status' => true,
                'data' => $read
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

    public static function UpdateUserPriviledge (Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required',
                'name' => 'required',
            ]);
    
            $validated = UserPriviledge::updateorcreate($validated);
    
            // return $request;
            return response()->json([
                'message' => 'User Priviledge  update successfully',
                'status' => true,
            ],200
            );  
        }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to update User Priviledge  ',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

    public static function DeleteUserPriviledge (Request $request)
    {
        try{
            $delete = $request->validate([
                'id' => 'required'
            ]);
            $delete = UserPriviledge::where($delete)->delete();
    
            // return $request;
            return response()->json([
                'message' => 'User Priviledge  delete successfully',
                'status' => true,
            ],200
            );          }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to delete User Priviledge  ',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

}