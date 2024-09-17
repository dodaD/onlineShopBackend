<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
  public function getAnotherOption($option_id)
  {
    $option = Option::find($option_id)->pictures;

    return response()->json(['pictures_for_this' => $option]);
  }
}
