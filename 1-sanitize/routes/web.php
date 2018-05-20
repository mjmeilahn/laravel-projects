<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/request', 'DataHandler@handle');
