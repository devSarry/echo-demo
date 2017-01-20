<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model {

    protected $fillable = ["name", "isOpen"];

    protected $dates = [];

    public static $rules = [
        "name" => "required",
    ];

    public $timestamps = false;

    public function message()
    {
        return $this->hasMany("App\Models\Message");
    }


}
