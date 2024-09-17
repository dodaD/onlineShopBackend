<?php

use App\Http\Controllers\CommmentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductsController::class);
Route::group([
  'middleware' => 'api',
  'prefix' => 'products'
], function ($router) {
  Route::get('/get_you_might_like/{product_id}', [ProductsController::class, 'getYouMightLikeToo']);
  Route::get('/get_specific_product/{product_id}', [ProductsController::class, 'getSpecificProduct']);
});

Route::group([
  'middleware' => 'api',
  'prefix' => 'options'
], function ($router) {
  Route::get('/{option_id}', [OptionController::class, 'getAnotherOption']);
});

Route::group([
  'middleware' => 'api',
  'prefix' => 'comments'
], function ($router) {
  Route::get('/{product_id}', [CommmentsController::class, 'index']);
  Route::get('get_stars/{product_id}', [CommmentsController::class, 'getStars']);
  Route::get('get_stars_statistics/{product_id}', [CommmentsController::class, 'getStatisticsOfStars']);
  Route::get('get_comments_with_stars/{product_id}/{stars}', [CommmentsController::class, 'getCommentsWithSpecificNumberOfStars']);
});
