<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\StoreProductRequest;


class CreateProduct extends Controller
{
    public function create(StoreProductRequest $request)
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
                'category_id'=>$request->input('category'),
            ]
        );
    }
    public function list()
    {
        $answer = [];
        $categories = Category::all();
        foreach($categories as $category){
            $types = ProductType::where('category_id', $category->id)->get();


            foreach($types as $type){
                $products = Product::where('product_type_id', $type->id)->get();
                if(count($products) == 0){
                    $answer[$category->name][$type->name] = 'No products';
                }else{
                    $answer[$category->name][$type->name] = $products;
                }
            }
        }
        if(count($answer) == 0){
            return ['message' => 'Products not found'];
        }
        return $answer;


    }
}

