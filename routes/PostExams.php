<?php

use App\Http\Controllers\PostTestExamController;

Route::controller(PostTestExamController::class)->group(function () {

    Route::any('PostExamCourseSelected', 'PostExamCourseSelected')->name('PostExamCourseSelected');

    Route::any('MgtPostExamQuestion/{id}', 'MgtPostExamQuestion')->name('MgtPostExamQuestion');

    Route::any('SelectPostTest/{id}', 'SelectPostTest')->name('SelectPostTest');

    Route::any('PostTestSelected', 'PostTestSelected')->name('PostTestSelected');

    Route::any('PostExamCourse', 'PostExamCourse')->name('PostExamCourse');

});