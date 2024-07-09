<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserService extends Controller
{
    
    public static function CreateUser (Request $request)
    {
       try{
        $create = $request->validate([
            'id' => 'required',
            'id_author' => 'required',
            'username' => 'required',
            'pass' => 'required',
            'full_name' => 'required',
            'email' => 'required'
        ]);

        $create = User::create($create);

        return response()->json([
            'message' => 'User create successfully',
            'status' => true,
        ],200
        );
       }
       catch (\Throwable $th){
        return response()->json([
            'message' => 'Failed to create User',
            'status' => false,
            'error' => $th->getMessage(),
        ],500
        );
        } 
    }

    public static function ReadUser (Request $request)
    {
        try{
            $read = User::all();

            return response()->json([
                'message' => 'User retrieved successfully',
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

    public static function UpdateUser (Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required',
                'id_author' => 'required',
                'username' => 'required',
                'pass' => 'required',
                'full_name' => 'required',
                'email' => 'required'
            ]);
    
            $validated = User::updateorcreate($validated);
    
            // return $request;
            return response()->json([
                'message' => 'User update successfully',
                'status' => true,
            ],200
            );  
        }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to update User',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

    public static function DeleteUser (Request $request)
    {
        try{
            $delete = $request->validate([
                'id' => 'required'
            ]);
            $delete = User::where($delete)->delete();
    
            // return $request;
            return response()->json([
                'message' => 'User delete successfully',
                'status' => true,
            ],200
            );          }
        catch (\Throwable $th){
            return response()->json([
                'message' => 'Failed to delete User',
                'status' => false,
                'error' => $th->getMessage(),
            ],500
            );
        }
    }

}
