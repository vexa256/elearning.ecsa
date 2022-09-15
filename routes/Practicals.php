<?php

use App\Http\Controllers\PracticalTestController;

Route::controller(PracticalTestController::class)
    ->group(function () {

        Route::any('PracSelectTest', 'PracSelectTest')->name('PracSelectTest');

        Route::any('PracTestSelected', 'PracTestSelected')->name('PracTestSelected');

        Route::any('PracTestSelectModule/{id}', 'PracTestSelectModule')->name('PracTestSelectModule');

        Route::any('PracModuleSelected',
            'PracModuleSelected')->name('PracModuleSelected');

        Route::any('MgtPracTest/{id}', 'MgtPracTest')->name('MgtPracTest');

    });