<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        //щоб отримати якусь певну колонку, треба в get в дужках записати
        // цю назву в лапках назву --> get("name")
        // згоден
        return response()->json(['products' => $products]);
    }
}
