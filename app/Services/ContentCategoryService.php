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
                $contentCategories
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()], 500
            );
        }
    }

    public static function createContentCategory(Request $request)
    {
        try {
            $requestData = $request->all();
            $contentCategory = ContentCategory::create($requestData);

            return response()->json(
                $contentCategory, 201
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()], 500
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
                $contentCategory
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()], 500
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
                ['message' => 'Content category deleted successfully']
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()], 500
            );
        }
    }
}
