<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ProductService{

    public function getAllProduct(Request $request){
        try {
            $product = Product::all();

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

    public function insertProduct(Request $request){

        try{
            $validator = Validator::make($request->all(), [
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


            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $product =  Product::create([
                            'grant_id'          => $request->grant_id,
                            'id_grant_category' => $request->id_grant_category,
                            'category'          => $request->category,
                            'tkt'               => $request->tkt,
                            'year'              => $request->year,
                            'description'       => $request->description,
                            'cover'             => $request->cover

                        ]);
            $value = DB::table('sinta_daftar_authors')
                ->join('products', 'sinta_daftar_authors.id_author', '=' , 'products.grant_id')
                ->select('products.*')
                ->get();
            return response()->json([
                'status' => 'true',
                'message' => 'product added successfully',
                'data' => $value
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'status' => 'false',
                'message' => 'failed to add the product',
                'error' => $e->getMessage()], 500);
        }
    }

    public function updateProduct(Request $request,$id_product){
        try {
            $validator = Validator::make($request->all(), [
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


            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
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
                'status' => 'true',
                'message' => 'product updated successfully',
                'data' => $product
            ],200);

        } catch (\Throwable $e){
            return response()->json([
                'status' => 'false',
                'message' => 'failed to update the product',
                'error' => $e->getMessage()], 500);
        }
    }

    public static function deleteProduct(Request $req, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'status' => 'true',
                'message' => 'product deleted successfully',
                'data' => $product
            ], 202);
        } catch (\Throwable $e){
            return response()->json([
                'status' => 'false',
                'message' => 'failed to delete the product',
                'error' => $e->getMessage()], 404);
        }
    }
}