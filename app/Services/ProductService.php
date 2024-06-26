<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Closure;
use Illuminate\Support\Facades\DB;
use App\Models\SintaDaftarAuthor;
class ProductService{

    public function getAllProduct(){
        try {

            $product = Product::with('grant')->get();

            return response()->json(
                [
                    'message' => 'product retrieved successfully',
                    'status' => 'true',
                    'data' => $product
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve product',
                    'status' => 'false',
                    'error' => $e->getMessage(),
                ], 200
            );
        }
    }

    public function GetPaginationProduct (){
        try {

            $product = Product::with('grant')->paginate();

            return response()->json(
                [
                    'message' => 'product retrieved successfully',
                    'status' => true,
                    'data' => $product
                ]
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => 'Failed to retrieve product',
                    'status' => false,
                    'error' => $e->getMessage(),
                ], 200
            );
        }
    }

    public function insertProduct(Request $request){

        try{
            $request->validate([
                'grant_id'          =>  'required',
                'id_grant_category' =>  'required',
                'category'          =>
                                        [
                                            'required',
                                            function (string $attribute, mixed $value, Closure $fail) {
                                                if ($value != 'product' && $value != 'prototype') {
                                                    $fail("The {$attribute} is invalid.");
                                                }
                                            },
                                        ],
                'tkt'               => 'required',
                'year'              => 'required|digits:4|integer',
                'description'       => 'required',
                'cover'             => 'required|url'
            ]);

            Product::create([
                'grant_id'          => $request->grant_id,
                'id_grant_category' => $request->id_grant_category,
                'category'          => $request->category,
                'tkt'               => $request->tkt,
                'year'              => $request->year,
                'description'       => $request->description,
                'cover'             => $request->cover

            ]);

            DB::table('sintadaftarauthor')
                ->join('products', 'sintadaftarauthor.id_author', '=' , 'products.grant_id')
                ->select('products.*')
                ->get();
            return response()->json([
                'message' => 'product added successfully',
                'status' => 'true',
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to add the product',
                'status' => 'false',
                'error' => $e->getMessage()], 500);
        }
    }

    public function updateProduct(Request $request,$id_product){
        try {
            $request->validate([
                'grant_id'          =>  'required',
                'id_grant_category' =>  'required',
                'category'          =>
                                        [
                                            'required',
                                            function (string $attribute, mixed $value, Closure $fail) {
                                                if ($value != 'product' && $value != 'prototype') {
                                                    $fail("The {$attribute} is invalid.");
                                                }
                                            },
                                        ],
                'tkt'               => 'required',
                'year'              => 'required|digits:4|integer',
                'description'       => 'required',
                'cover'             => 'required|url'
            ]);

            $product = Product::findOrFail($id_product);
            $product->update([
                'grant_id'          => $request->grant_id,
                'id_grant_category' => $request->id_grant_category,
                'category'          => $request->category,
                'tkt'               => $request->tkt,
                'year'              => $request->year,
                'description'       => $request->description,
                'cover'             => $request->cover
            ]);
            return response()->json([
                'message' => 'product updated successfully',
                'status' => 'true',
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to update the product',
                'status' => 'false',
                'error' => $e->getMessage()], 500);
        }
    }

    public function deleteProduct($id_product)
    {
        try {
            $product = Product::findOrFail($id_product);
            $product->delete();
            return response()->json([
                'message' => 'product deleted successfully',
                'status' => 'true',
            ], 202);
        } catch (\Throwable $e){
            return response()->json([
                'message' => 'failed to delete the product',
                'status' => 'false',
                'error' => $e->getMessage()], 404);
        }
    }
}