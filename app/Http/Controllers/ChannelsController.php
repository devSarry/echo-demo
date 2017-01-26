<?php

namespace App\Http\Controllers;

class ChannelsController extends Controller {

    const MODEL = "App\Models\Channel";

    use RESTActions;

    public function get($id)
    {
        $m = self::MODEL;
        $model = $m::find($id);

        
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $model);
    }
}
