<?php

Route::get('/', 'WelcomeController@show');

// Documentation
Route::group(['prefix' => 'docs'], function () {

    Route::get('/', 'DocsController@index');
    Route::get('/{language}/{version}/{page}', 'DocsController@show')
        ->where('page', '.*')
        ->name('docs.show');

});
