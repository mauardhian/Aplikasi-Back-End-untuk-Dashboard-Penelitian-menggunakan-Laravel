<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

class ArticleService{
    public function getAllArticle()
    {
        //
        try {
            $article = Article::orderBy('id', 'asc')->get();
            return response()->json([
                'status'=>true,
                'message'=>'All article found',
                'data' => $article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'failed to get All Article',
                'error' => $th->getMessage()], 500);
        }

    }

    public function getArticleById(string $id){
        try{
            $data=Article::findOrFail($id);
            return response()->json([
                'status'=>true,
                'message'=>'article found',
                'data'=>$data
            ],200);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'article not found',
                'error' => $th->getMessage()], 500);
        }

    }

    public static function createArticle(Request $req)
    {
        try {
            $article = new Article;
            $article->title = $req->title;
            $article->input_date = $req->input_date;
            $article->status_publish = $req->status_publish;
            $article->news_content = $req->news_content;
            $article->author = $req->author;
            $article->thumbnail_image = $req->file('thumbnail_image')->getClientOriginalExtension();

            $article->save();
            return response()->json([
                'status' => true,
                'message' => 'Article successfully created',
                'data' => $article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'create article failed',
                'error' => $th->getMessage()], 500);
        }
    }

    public static function updateArticle(Request $req, string $id)
    {
        try {
            $article = Article::findorFail($id);
            $article->title = $req->title;
            $article->input_date = $req->input_date;
            $article->status_publish = $req->status_publish;
            $article->news_content = $req->news_content;
            $article->author = $req->author;
            $article->thumbnail_image = $req->file('thumbnail_image')->getClientOriginalExtension();

            $article->save();
            return response()->json([
                'status'=>true,
                'message'=>'article successfully updated',
                'data' => $article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' =>false,
                'message' => 'update article failed',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public static function deleteArticle(string $id)
    {
        try {
            $article = Article::findorFail($id);
            $article->delete();
            return response()->json([
                'status' => true,
                'message' => 'article deleted'
            ], 200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'delete article failed',
                'error' => $th->getMessage()], 500);
        }
    }
}
