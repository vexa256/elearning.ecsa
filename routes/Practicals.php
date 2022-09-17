<?php

use App\Http\Controllers\PracticalQuestionsController;
use App\Http\Controllers\PracticalTestController;

Route::controller(PracticalQuestionsController::class)->group(function () {
    Route::get('PracSelectTest', 'PracSelectTest')->name('PracSelectTest');
});
Route::controller(PracticalTestController::class)->group(function () {

    Route::any('PracSelectTest', 'PracSelectTest')->name('PracSelectTest');

    Route::any('PracTestSelected', 'PracTestSelected')->name('PracTestSelected');

    Route::any('PracTestSelectModule/{id}', 'PracTestSelectModule')->name('PracTestSelectModule');

    Route::any('PracModuleSelected',
        'PracModuleSelected')->name('PracModuleSelected');

    Route::any('MgtPracTest/{id}', 'MgtPracTest')->name('MgtPracTest');

});