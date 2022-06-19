<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FollowController;
use App\Http\Controllers\Api\V1\PageController;
use App\Http\Controllers\Api\V1\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth', 
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

});

Route::group([
    'middleware' => ['auth:sanctum'],
], function () {
    /*
        Page Section
     */
    Route::post('page/create', [PageController::class, 'create']);
    Route::post('page/{pageId}/attach-post', [PageController::class, 'attachPost']);
    Route::post('follow/page/{pageId}', [PageController::class, 'follow']);

    /*
        Person Section
     */
    Route::get('person/feed', [PersonController::class, 'feed']);
    Route::post('person/attach-post', [PersonController::class, 'attachPost']);
    Route::post('follow/person/{personId}', [PersonController::class, 'follow']);


});
