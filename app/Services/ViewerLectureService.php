<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\ViewerLecture;
use function Symfony\Component\Translation\t;

class ViewerLectureService{
    public static function getAllViewerService(Request $request): JsonResponse
    {
        try{
            $viewerLecture = ViewerLecture::all();
            return response()->json(
                [
                    'message' => 'Viewer lecture retrieved successfully',
                    'status' => true,
                    'data' => $viewerLecture
                ]
            );
        }catch (\Throwable $th){
            return response()->json(
                [
                    'message' => 'Failed to retrieve viewer lecture',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 200
            );
        }
    }

    public static function createViewerLecture(Request $request): JsonResponse
    {
        try {
            $requestData = $request->all();
            $viewerLecture = ViewerLecture::create($requestData);

            return response()->json(
                [
                    'message' => 'Viewer lecture created successfully',
                    'status' => true,
                    'data' => $viewerLecture
                ], 201
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to create viewer lecture',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }

    public static function updateViewerLecture(Request $request): JsonResponse
    {
        try {
            $id = $request->input('id');
            $viewerLecture = ViewerLecture::findOrFail($id);
            $viewerLecture->update($request->all());

            return response()->json(
                [
                    'message' => 'Viewer lecture updated successfully',
                    'status' => true,
                    'data' => $viewerLecture
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to update viewer lecture',
                    'status' => false,
                    'error' => $th->getMessage()
                ], 500
            );
        }
    }

    public static function deleteViewerLecture(Request $request): JsonResponse
    {
        try {
            $id = $request->input('id');
            $viewerLecture = ViewerLecture::findOrFail($id);
            $viewerLecture->delete();

            return response()->json(
                [
                    'message' => 'Viewer lecture deleted successfully',
                    'status' => true,
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Failed to delete viewer lecture',
                    'status' => false,
                    'error' => $th->getMessage(),
                ], 500
            );
        }
    }
}
