<?php

use App\Http\Controllers\AdditionalPicturesController;
use App\Http\Controllers\CommmentsController;
use App\Http\Controllers\ProductsController;
use App\Models\AdditionalPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('products', ProductsController::class);

Route::group([
  'middleware' => 'api',
  'prefix' => 'additional_pictures'
], function ($router) {
  Route::get('/{product_id}', [AdditionalPicturesController::class, 'getAdditionalPictures']);
});

Route::group([
  'middleware' => 'api',
  'prefix' => 'comments'
], function ($router) {
  Route::get('/{product_id}', [CommmentsController::class, 'index']);
  Route::get('get_stars/{product_id}', [CommmentsController::class, 'getStars']);
  Route::get('get_stars_statistics/{product_id}', [CommmentsController::class, 'getStatisticsOfStars']);
});
