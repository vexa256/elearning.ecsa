<?php

use App\Http\Controllers\PreTestExamController;

Route::controller(PreTestExamController::class)->group(function () {

    Route::any('PreExamCourseSelected', 'PreExamCourseSelected')->name('PreExamCourseSelected');

    Route::any('MgtPreExamQuestion/{id}', 'MgtPreExamQuestion')->name('MgtPreExamQuestion');

    Route::any('SelectPreTest/{id}', 'SelectPreTest')->name('SelectPreTest');

    Route::any('PreTestSelected', 'PreTestSelected')->name('PreTestSelected');

    Route::any('PreExamCourse', 'PreExamCourse')->name('PreExamCourse');

});