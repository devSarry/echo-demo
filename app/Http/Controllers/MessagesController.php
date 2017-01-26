<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Message;
use Illuminate\Http\Response;
use JWTAuth;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    const MODEL = "App\Models\Message";

    use RESTActions;

    public function all($channel_id)
    {
        $messages = Channel::find($channel_id)
            ->messages()
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->respond(Response::HTTP_OK, $messages);
    }

    public function add(Request $request, $channel_id)
    {
        $currentUser = JWTAuth::parseToken()->authenticate();

        $m = self::MODEL;

        $this->validate($request, $m::$rules);

        $message = $currentUser->messages()->create($request->all());

        $message->channel()->attach($channel_id);

        return $this->respond(Response::HTTP_CREATED, $message);
    }
}
