<?php

use App\Http\Controllers\ConfigController;

Route::controller(ConfigController::class)->group(function () {
    Route::get('MgtExamDuration', 'MgtExamDuration')
        ->name('MgtExamDuration');

    Route::post('NewDuration', 'NewDuration')
        ->name('NewDuration');

    Route::post('NewSchedule', 'NewSchedule')
        ->name('NewSchedule');

    Route::get('ExamTimerSettings', 'ExamTimerSettings')
        ->name('ExamTimerSettings');
});