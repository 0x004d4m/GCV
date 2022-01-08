<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;
use App\Models\client;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $client = client::select('*')->where('token',$request->header('Authorization'))->first();
        $category= category::select('*')->where('client_id',$client['id'])->get();
        return response()->json($category, 200);
    }
}
