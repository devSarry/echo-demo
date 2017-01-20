<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $fillable = ["name", "email", "password", "isOnline"];

    protected $dates = [];

    public static $rules = [
        "name" => "required|min:3",
        "email" => "required|email|unique:users,email",
        "password" => "required|min:6",
    ];

    public $timestamps = false;

    public function messages()
    {
        return $this->hasMany("App\Models\Message");
    }

    public function SoundMoji()
    {
        return $this->hasMany("App\Models\SoundMoji");
    }


}
