<?php

use App\Http\Controllers\PostTestController;

Route::controller(PostTestController::class)->group(function () {

    Route::get('MgtPostTests/{id}', 'MgtPostTests')->name('MgtPostTests');

    Route::get('PostTestCourse', 'PostTestCourse')->name('PostTestCourse');

    Route::post('CoursePostTestSelected', 'CoursePostTestSelected')->name('CoursePostTestSelected');

});