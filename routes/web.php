<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobApiController;


//home route
Route::get('/', function () {
    return view('welcome');
});
  


Route::apiResource('jobs', JobApiController::class);
