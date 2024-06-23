<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductType;

class CreateProductType extends Controller
{
    public function create(Request $request)
    {
        $category = Category::firstOrNew(['name'=>$request->input('category')]);
        $productType = ProductType::create(
            [
            'name'=>$request->input('name'),
            'category_id'=>$category->id,
            ]
        );
    }
    public function list(){
        return ProductType::all();
    }
    public function categoryList($category)
    {
        $productTypes = ProductType::where('category_id', $category)->get();
        if(count($productTypes) == 0){
            return ['message' => 'Products not found'];
        }
        return $productTypes;
    }
}
