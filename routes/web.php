<?php

$this->get('/', 'WelcomeController@index');

// Documentation
$this->group(['prefix' => 'docs'], function () {

    $this->get('/', 'DocsController@index');
    $this->get('/{language}/{version}/{page}', 'DocsController@show')
        ->where('page', '.*')
        ->name('docs.show');

});
