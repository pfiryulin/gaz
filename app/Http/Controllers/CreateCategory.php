<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CreateCategory extends Controller
{
    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
    }
}
