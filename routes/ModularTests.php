<?php

use App\Http\Controllers\ModTestExamController;
use App\Http\Controllers\ModularTestController;

Route::controller(ModTestExamController::class)->group(function () {
    Route::get('ModExamCourse', 'ModExamCourse')->name('ModExamCourse');
});

Route::controller(ModularTestController::class)->group(function () {

    Route::get('MgtModularTest/{id}', 'MgtModularTest')->name('MgtModularTest');

    Route::get('ModularTestsMod/{id}', 'ModularTestsMod')->name('ModularTestsMod');

    Route::get('ModularTestCourse', 'ModularTestCourse')->name('ModularTestCourse');

    Route::post('ModularTestAdapt', 'ModularTestAdapt')->name('ModularTestAdapt');

    Route::post('CourseModularSelected', 'CourseModularSelected')->name('CourseModularSelected');

});