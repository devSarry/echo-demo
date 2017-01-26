<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model {

    protected $fillable = ["name", "isOpen"];

    protected $dates = [];

    public static $rules = [
        "name" => "required",
    ];

    public $timestamps = false;

    public function messages()
    {
        return $this->belongsToMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
