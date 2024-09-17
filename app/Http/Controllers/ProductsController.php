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

  public function getYouMightLikeToo($product_id)
  {
    $product = Product::where('id', $product_id)->first();
    $themed_products = Product::where('theme', $product->theme)->take(8)->get();
    $typed_products = Product::where('type', $product->ype)->take(16)->get();
    $random_products = Product::take(24)->get();
    $products = $themed_products->merge($typed_products)->merge($random_products)->unique()->take(8);

    return response()->json(['products' => $products]);
  }

  public function getSpecificProduct($product_id)
  {
    $product = Product::where('id', $product_id)->first();
    $options_for_product = $product->options;
    foreach ($options_for_product as $option) {
      if ($option->is_default) {
        $option->pictures;
        break;
      }
    }

    return response()->json(['options_for_product' => $options_for_product]);
  }
}
