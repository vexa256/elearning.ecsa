<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\PreTestExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(PreTestExamController::class)->group(function () {
    Route::get('AjaxMgtPretests/{id}', 'AjaxMgtPretests')->name('AjaxMgtPretests');

});

Route::controller(CourseController::class)->group(function () {

    Route::post('MgtModules', 'MgtModules')->name('MgtModules');

    Route::post('SaveNewCourse', 'SaveNewCourse')->name('SaveNewCourse');
});
Route::controller(CrudController::class)->group(function () {

    Route::post('ApiInsert', 'ApiInsert')->name('ApiInsert');

    Route::post('MassInsert', 'MassInsert')->name('MassInsert');

    Route::post('ApiMassUpdate', 'ApiMassUpdate')->name('ApiMassUpdate');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});