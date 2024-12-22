<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\BrandInquiryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function () {
    // Contact form route
    Route::post('/contact', [ContactController::class, 'store']);

    // Brand inquiries endpoint
    Route::post('/brand-inquiries', [BrandInquiryController::class, 'store']);

    // Blog API route
    Route::get('/blogs', [BlogController::class, 'index']);

    // Pages routes
    Route::prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'index']);
        Route::get('/search', [PageController::class, 'search']);
        Route::get('/layout/{layout}', [PageController::class, 'getByLayout']);
        Route::get('/parent/{parentId?}', [PageController::class, 'getByParent']);
        Route::get('/{page:slug}', [PageController::class, 'show']);
    });
});
