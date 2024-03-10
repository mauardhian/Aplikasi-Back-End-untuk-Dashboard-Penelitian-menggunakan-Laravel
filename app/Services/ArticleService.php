<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

class ArticleService{
    public static function getAllArticle()
    {
        try {
            $article = Article::orderBy('id', 'asc')->get();
            return response()->json([
                'status'=>'true',
                'message'=>'article ditemukan',
                'data' => $article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $e->getMessage()], 404);
        }
    }

    public static function postCreateArticle(Request $req)
    {
        try {
            $article = new Article;
            $article->title = $req->title;
            $article->input_date = $req->input_date;
            $article->status_publish = $req->status_publish;
            $article->news_content = $req->news_content;
            $article->author = $req->author;
            $article->thumbnail_image = $req->thumbnail_image;

            $article->save();
            return response()->json([
                'status' => 'true',
                'message' => 'Data berhasil ditambahkan',
                'data' => $article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $e->getMessage()], 500);
        }
    }

    public static function putUpdateArticle(Request $req, $id)
    {
        try {
            $article = Article::find($id);
            $article->title = $req->title;
            $article->input_date = $req->input_date;
            $article->status_publish = $req->status_publish;
            $article->news_content = $req->news_content;
            $article->author = $req->author;
            $article->thumbnail_image = $req->thumbnail_image;

            $article->save();
            return response()->json([
                'status'=>'true',
                'message'=>'berhasil malakukan update data',
                'data'=>$article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public static function deleteArticle(Request $req, $id)
    {
        try {
            $article = Article::find($id);
            $article->delete();
            return response()->json([
                'status' => 'true',
                'message' => 'article dihapus'
            ], 202);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $e->getMessage()], 404);
        }
    }
}