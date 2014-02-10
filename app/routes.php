<?php

Route::group(array('prefix' => 'web'), function()
{
    Route::get('/', function()
    {
        return View::make('app');
    });
});

Route::group(array('prefix' => 'ws'), function()
{
    Route::get('/', function()
    {
        return Response::json(array('status' => true));
    });
});