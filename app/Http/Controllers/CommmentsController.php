<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommmentsController extends Controller
{
  public function index($product_id)
  {
    $comments = Comment::where('product_id', $product_id)
      ->simplePaginate(1);

    return response()->json(['comments' => $comments]);
  }

  public function getStars($product_id)
  {
    $stars = Comment::where('product_id', $product_id)
      ->avg('stars');
    $amount_of_comments = Comment::where('product_id', $product_id)->count();

    return response()->json(['stars' => $stars, 'amount_of_comments' => $amount_of_comments]);
  }
}
