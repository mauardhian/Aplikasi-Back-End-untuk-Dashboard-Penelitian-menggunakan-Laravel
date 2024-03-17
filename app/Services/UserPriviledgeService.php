<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\UserPriviledge;

class UserPriviledgeService
{
    public static function getAllUserPriviledge(Request $request)
    {
        try {
            $userPriviledge = UserPriviledge::all();

            return response()->json(
                [
                    'message' => 'User priviledge retrieved successfully',
                    'status' => true,
                    'data' => $userPriviledge
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve user priviledge',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 200
            );
        }
    }

    public static function createUserPriviledge(Request $request)
    {
        try {
            $requestData = $request->all();
            $userPriviledge = UserPriviledge::create($requestData);

            return response()->json(
                [
                    'message' => 'User priviledge created successfully',
                    'status' => true,
                    'data' => $userPriviledge
                ], 201
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to create user priviledge',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }
    
    public static function updateUserPriviledge(Request $request)
    {
        try {
            $id = $request->input('id');
            $userPriviledge = UserPriviledge::findOrFail($id);
            $userPriviledge->update($request->all());

            return response()->json(
                [
                    'message' => 'User priviledge updated successfully',
                    'status' => true,
                    'data' => $userPriviledge
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to update user priviledge',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }

    public static function deleteUserPriviledge(Request $request)
    {
        try {
            $id = $request->input('id');
            $userPriviledge = UserPriviledge::findOrFail($id);
            $userPriviledge->delete();

            return response()->json(
                [
                    'message' => 'User priviledge deleted successfully',
                    'status' => true,
                    'data' => $userPriviledge
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to delete user priviledge',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }
}