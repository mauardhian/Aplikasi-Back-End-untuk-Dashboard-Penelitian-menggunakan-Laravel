<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\ContentCategory;
use Illuminate\Support\Facades\Http;

class ContentCategoryService
{
    public static function getAllContentCategories(Request $request)
    {
        try {
            $contentCategories = ContentCategory::all();

            return response()->json(
                [
                    'message' => 'Content categories retrieved successfully',
                    'status' => 'true',
                    'data' => $contentCategories
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve content categories',
                    'status' => 'false',
                    'error' => $th->getMessage(),
                ], 200
            );
        }
    }

    public static function createContentCategory(Request $request)
    {
        try {
            $requestData = $request->all();
            $contentCategory = ContentCategory::create($requestData);

            return response()->json(
                [
                    'message' => 'Content category created successfully',
                    'status' => 'true',
                    'data' => $contentCategory
                ], 201
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to create content category',
                    'status' => 'false',
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }

    public static function updateContentCategory(Request $request)
    {
        try {
            $id = $request->input('id');
            $contentCategory = ContentCategory::findOrFail($id);
            $contentCategory->update($request->all());

            return response()->json(
                [
                    'message' => 'Content category updated successfully',
                    'status' => 'true',
                    'data' => $contentCategory
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to update content category',
                    'status' => 'false',
                    'error' => $th->getMessage()
                ], 500
            );
        }
    }

    public static function deleteContentCategory(Request $request)
    {
        try {
            $id = $request->input('id');
            $contentCategory = ContentCategory::findOrFail($id);
            $contentCategory->delete();

            return response()->json(
                [
                    'message' => 'Content category deleted successfully',
                    'status' => 'true',
                ], 204
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to delete content category',
                    'status' => 'false',
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }
}
