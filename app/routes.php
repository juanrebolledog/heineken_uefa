<?php

Route::group(array('prefix' => 'web'), function()
{
    Route::get('', 'DesktopController@index');
});

Route::group(array('prefix' => 'mobile'), function()
{
    Route::get('', 'MobileController@index');
});

Route::get('like', function()
{
    return View::make('like');
});

Route::get('/fb_login', function()
{
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/web')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/web')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $user = User::whereUid($uid)->first();
    if (empty($user)) {

        $user = new User;
        $user->nombres = $me['first_name'];
        $user->apellidos = $me['last_name'];
        $user->email = $me['email'];
        $user->uid = $uid;
        //$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();
    }

    $user->access_token = $facebook->getAccessToken();
    $user->save();

    Auth::login($user);

    return Redirect::to('/web')->with('message', 'Logged in with Facebook');
});

Route::group(array('prefix' => 'ws'), function()
{
    Route::get('/', function()
    {
        return Response::json(array('status' => true));
    });
});