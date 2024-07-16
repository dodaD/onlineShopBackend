<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdditionalPicture;

class AdditionalPicturesController extends Controller
{
  public function getAdditionalPictures($product_id)
  {
    $optinal_pictures = AdditionalPicture::where('optinal', 1)
      ->where('product_id', $product_id)
      ->get();
    $additional_pictures = AdditionalPicture::where('product_id', 1)
      ->get();
    //щоб отримати якусь певну колонку, треба в get в дужках записати
    // цю назву в лапках назву --> get("name")
    // згоден
    return response()->json(['optional_pictures' => $optinal_pictures, 'additional_pictures' => $additional_pictures]);
  }
}
