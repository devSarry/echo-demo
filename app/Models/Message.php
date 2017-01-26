<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ["text", "user_id", "channel_id"];

    protected $dates = [];

    public static $rules = [
        "text" => "required",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class)->withTimestamps();
    }


}
