<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ["text", "user_id"];

    protected $dates = [];

    public static $rules = [
        "text" => "required",
        "user_id" => "required|numeric",
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function channel()
    {
        return $this->belongsToMany("App\Models\Channel")->withTimestamps();
    }


}
