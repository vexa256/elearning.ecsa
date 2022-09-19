<?php

use App\Http\Controllers\PracticalQuestionsController;
use App\Http\Controllers\PracticalTestController;

Route::controller(PracticalQuestionsController::class)->group(function () {

    Route::any('PracQtnTestCourse', 'PracQtnTestCourse')->name('PracQtnTestCourse');

    Route::any('GoToManagePracQtns', 'GoToManagePracQtns')->name('GoToManagePracQtns');

    Route::any('CoursePracQtnSelected', 'CoursePracQtnSelected')->name('CoursePracQtnSelected');

    Route::any('PracQtnSelectTest/{id}', 'PracQtnSelectTest')->name('PracQtnSelectTest');

    Route::any('MgtPracQtnTest/{id}', 'MgtPracQtnTest')->name('MgtPracQtnTest');

    Route::any('PracQtnTestsMod/{id}', 'PracQtnTestsMod')->name('PracQtnTestsMod');

    Route::any('PracQtnTestAdapt', 'PracQtnTestAdapt')->name('PracQtnTestAdapt');

});
Route::controller(PracticalTestController::class)->group(function () {

    Route::any('PracSelectTest', 'PracSelectTest')->name('PracSelectTest');

    Route::any('PracTestSelected', 'PracTestSelected')->name('PracTestSelected');

    Route::any('PracTestSelectModule/{id}', 'PracTestSelectModule')->name('PracTestSelectModule');

    Route::any('PracModuleSelected',
        'PracModuleSelected')->name('PracModuleSelected');

    Route::any('MgtPracTest/{id}', 'MgtPracTest')->name('MgtPracTest');

});