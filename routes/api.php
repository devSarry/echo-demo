<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'api\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'api\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'api\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'api\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {

        /**
         * Routes for resource message
         */
        $api->get('message', 'App\Http\Controllers\MessagesController@all');
        $api->get('message/{id}', 'App\Http\Controllers\MessagesController@get');
        $api->post('message', 'App\Http\Controllers\MessagesController@add');
        $api->put('message/{id}', 'App\Http\Controllers\MessagesController@put');
        $api->delete('message/{id}', 'App\Http\Controllers\MessagesController@remove');

        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to this item is only for authenticated user. Provide a token in your request!'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });

    /**
     * Routes for resource user
     */
    $api->get('user', 'App\Http\Controllers\UsersController@all');
    $api->get('user/{id}', 'App\Http\Controllers\UsersController@get');
    $api->post('user', 'App\Http\Controllers\UsersController@add');
    $api->put('user/{id}', 'App\Http\Controllers\UsersController@put');
    $api->delete('user/{id}', 'App\Http\Controllers\UsersController@remove');

    /**
     * Routes for resource channel
     */
    $api->get('channel', 'App\Http\Controllers\ChannelsController@all');
    $api->get('channel/{id}', 'App\Http\Controllers\ChannelsController@get');
    $api->post('channel', 'App\Http\Controllers\ChannelsController@add');
    $api->put('channel/{id}', 'App\Http\Controllers\ChannelsController@put');
    $api->delete('channel/{id}', 'App\Http\Controllers\ChannelsController@remove');

    /**
     * Routes for resource sound-moji
     */
    $api->get('sound-moji', 'SoundMojisController@all');
    $api->get('sound-moji/{id}', 'SoundMojisController@get');
    $api->post('sound-moji', 'SoundMojisController@add');
    $api->put('sound-moji/{id}', 'SoundMojisController@put');
    $api->delete('sound-moji/{id}', 'SoundMojisController@remove');



});
