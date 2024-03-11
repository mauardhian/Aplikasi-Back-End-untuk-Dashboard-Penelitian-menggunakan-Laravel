<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleService{
    public function getAllArticle()
    {
        //
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
                'error' => $th->getMessage()], 500);
        }

    }

    public function show(string $id){
        try{
            $data=Article::findOrFail($id);
            return response()->json([
                'status'=>'true',
                'message'=>'article ditemukan',
                'data'=>$data
            ],200);
        }catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $th->getMessage()], 500);
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
            $article->thumbnail_image = $req->file('thumbnail_image')->getClientOriginalExtension();

            $article->save();
            return response()->json([
                'status' => 'true',
                'message' => 'Data berhasil ditambahkan',
                'data' => $article
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $th->getMessage()], 500);
        }
    }

    public static function putUpdateArticle(Request $req, string $id)
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
                'status'=>'true',
                'message'=>'berhasil malakukan update data',
            ],200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
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
                'status' => 'true',
                'message' => 'article dihapus'
            ], 200);
        } catch (\Throwable $th){
            return response()->json([
                'status' => 'false',
                'error' => $th->getMessage()], 500);
        }
    }
}