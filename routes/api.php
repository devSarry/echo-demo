<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);

        /*
         *  Routes for getting user info
         */
        $api->get('user', 'App\Http\Controllers\UsersController@all');
        $api->get('user/{id}', 'App\Http\Controllers\UsersController@get');


        /**
         * Routes for resource message
         */
        $api->get('channel/{channel}/message', 'App\Http\Controllers\MessagesController@all');
        $api->get('channel/1/message/{id}', 'App\Http\Controllers\MessagesController@get');
        $api->post('channel/{channel}/message', 'App\Http\Controllers\MessagesController@add');

        /** Create a middleware allow for admins to remove or edit messages*/

        //$api->put('message/{id}', 'App\Http\Controllers\MessagesController@put');
        //$api->delete('message/{id}', 'App\Http\Controllers\MessagesController@remove');



        /**
         * Routes for resource sound-moji
         */
        $api->get('sound-moji', 'App\Http\Controllers\SoundMojisController@all');
        $api->get('sound-moji/{id}', 'App\Http\Controllers\SoundMojisController@get');
        $api->post('sound-moji', 'App\Http\Controllers\SoundMojisController@add');
        $api->put('sound-moji/{id}', 'App\Http\Controllers\SoundMojisController@put');
        $api->delete('sound-moji/{id}', 'App\Http\Controllers\SoundMojisController@remove');


        /**
         * Routes for resource channel feature to be added later.
         */
        $api->get('channel', 'App\Http\Controllers\ChannelsController@all');
        $api->get('channel/{id}', 'App\Http\Controllers\ChannelsController@get');
        //$api->post('channel', 'App\Http\Controllers\ChannelsController@add');
        //$api->put('channel/{id}', 'App\Http\Controllers\ChannelsController@put');
        //$api->delete('channel/{id}', 'App\Http\Controllers\ChannelsController@remove');



    });


    /**
     * Routes for resource user
     */
    //$api->get('user', 'App\Http\Controllers\UsersController@all');
    //$api->get('user/{id}', 'App\Http\Controllers\UsersController@get');

    //$api->put('user/{id}', 'App\Http\Controllers\UsersController@put');
    //$api->delete('user/{id}', 'App\Http\Controllers\UsersController@remove');







});
