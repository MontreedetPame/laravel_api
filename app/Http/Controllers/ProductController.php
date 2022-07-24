<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $response = [];
        try{
            $product = new Product();
            $product->name = $request->input('สินค้า xx');
            $product->price = $request->input('10.5');
            $product->description = $request->input('สินค้าชิ้นใหม่');
            $product->save();
            $response['success'] = "1";
            $response['message'] = "เพิ่มสินค้าสำเร็จ";
            $response['product'] = $product;
        }catch(QueryException $e){
            $response['success'] = "0";
            $response['message'] = $e;
        }
        return response()->json($response);
    }
}
