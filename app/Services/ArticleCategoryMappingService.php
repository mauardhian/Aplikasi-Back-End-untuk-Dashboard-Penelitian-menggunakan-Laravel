<?php

namespace App\Services;

use App\Models\ArticleCategoryMapping;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ArticleCategoryMappingService{
    public static function getAllArticleCategoryMapping(Request $request): JsonResponse
    {
        try{
            $articleCategoryMapping = ArticleCategoryMapping::all();
            return response()->json(
                [
                    'message' => 'Article category mapping retrieved successfully',
                    'status' => 'true',
                    'data' => $articleCategoryMapping
                ]
            );
        }catch (\Throwable $th){
            return response()->json(
                [
                    'message' => 'Failed to retrieve article category mapping',
                    'status' => 'false',
                    'error' => $th->getMessage(),
                ], 200
            );
        }
    }

    public static function createArticleCategoryMapping(Request $request): JsonResponse
    {
        try {
            $requestData = $request->all();
            $articleCategoryMapping = ArticleCategoryMapping::create($requestData);

            return response()->json(
                [
                    'message' => 'Article category mapping created successfully',
                    'status' => 'true',
                    'data' => $articleCategoryMapping
                ], 201
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to create article category mapping',
                    'status' => 'false',
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }

    public static function updateArticleCategoryMapping(Request $request): JsonResponse
    {
        try {
            $id = $request->input('id');
            $articleCategoryMapping = ArticleCategoryMapping::findOrFail($id);
            $articleCategoryMapping->update($request->all());

            return response()->json(
                [
                    'message' => 'Article category mapping updated successfully',
                    'status' => 'true',
                    'data' => $articleCategoryMapping
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to update article category mapping',
                    'status' => 'false',
                    'error' => $th->getMessage()
                ], 500
            );
        }
    }

    public static function deleteArticleCategoryMapping(Request $request): JsonResponse
    {
        try {
            $id = $request->input('id');
            $articleCategoryMapping = ArticleCategoryMapping::findOrFail($id);
            $articleCategoryMapping->delete();

            return response()->json(
                [
                    'message' => 'Article category mapping deleted successfully',
                    'status' => 'true',
                ], 204
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to delete article category mapping',
                    'status' => 'false',
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }
}
