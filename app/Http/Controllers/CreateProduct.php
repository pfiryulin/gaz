<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Product;


class CreateProduct extends Controller
{
    public function create(Request $request)
    {
        $productType = ProductType::firstOrNew(
            [
                'name'=>$request->input('type'),
                'category_id'=>$request->input('category'),
            ]
        );
        $product = Product::create(
            [
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'product_type_id'=>$productType->id,
            ]
        );
    }
}
