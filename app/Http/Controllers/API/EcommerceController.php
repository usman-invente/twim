<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Validator;

class EcommerceController extends Controller
{
    public function shops()
    {
        try {
            $shops = Shop::all();
            $data = [
                'shops' => $shops
            ];

            $mappedShops = $shops->map(function ($shop) {
                // Replace 'your_logic_here' with your actual logic to generate the URL
                $url =  env('APP_URL') . $shop->id; // Example URL format
                $shop->url = $url;
                return $shop;
            });
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'shops list get'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Something Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getProducts(Request $request)
    {
        try {
            $rules = array(
                'id' => ['required'],
            );
            $messages = [
                'id.required' => 'shop id required',

            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $messages = $validator->errors()->all();
                $msg = $messages[0];
                return response()->json([
                    'status' => false,
                    'data' => [],
                    'message' => $msg
                ], 404, [], JSON_FORCE_OBJECT);
            } else {
                $shop = Shop::find($request->id);

                if (!$shop) {
                    return response()->json([
                        'success' => false,
                        'data' => [],
                        'message' => 'no shop found'
                    ], 400, [], JSON_FORCE_OBJECT);
                }

                $products = $shop->products;
                $data = [
                    'products' =>  $products,
                    'shopTitle' =>  $shop->title
                ];

                return response()->json([
                    'success' => true,
                    'data' => $data,
                    'message' => 'products list get'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Something Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getShopCategory()
    {
        try {
            $category = ShopCategory::all();
            $data = [
                'category' => $category
            ];
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'categories list get'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Something Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
