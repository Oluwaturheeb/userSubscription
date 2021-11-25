<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\WebsiteSubscriptionController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// website list and subscription

Route::get('/website-list', [WebsiteSubscriptionController::class, 'index']);
Route::get('/subscribe-to-website', [WebsiteSubscriptionController::class, 'subscribe']);

// create postController
Route::put('/create-post', [PostController::class, 'create']);

Route::put('/user', [UserController::class, 'create']);
