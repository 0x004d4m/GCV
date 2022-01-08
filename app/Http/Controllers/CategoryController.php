<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $category= category::select('*')->get();
        return response()->json($category, 200);
    }
}
