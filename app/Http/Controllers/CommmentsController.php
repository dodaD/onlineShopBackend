<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommmentsController extends Controller
{
  public function index($product_id)
  {
    $comments = Comment::where('product_id', $product_id)
      ->join('users', 'users.id', '=', 'comments.user_id')
      ->addSelect(['name', 'text', 'stars', 'comments.id', 'comments.created_at'])
      ->paginate(2);

    return response()->json(['comments' => $comments]);
  }

  public function getStars($product_id)
  {
    $stars = Comment::where('product_id', $product_id)
      ->avg('stars');
    $amount_of_comments = Comment::where('product_id', $product_id)->count();

    return response()->json(['stars' => $stars, 'amount_of_comments' => $amount_of_comments]);
  }

  public function getStatisticsOfStars($product_id)
  {
    $array_with_number_of_stars = [];
    for ($i = 1; $i <= 5; $i++) {
      $amount_of_comments = DB::table('comments')
        ->where('product_id', '=', $product_id)
        ->where('stars', '=', $i)
        ->count();
      $array_with_number_of_stars[$i] = $amount_of_comments;
    }

    return response()->json([$array_with_number_of_stars]);
  }
}
