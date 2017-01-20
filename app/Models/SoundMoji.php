<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoundMoji extends Model {

    protected $fillable = ["name", "code", "urlPath", "fileName", "plays", "user_id"];

    protected $dates = [];

    public static $rules = [
        "name" => "required|min:3",
        "code" => "required|min:3",
        "urlPath" => "required",
        "fileName" => "required",
        "plays" => "requried|numeric",
        "user_id" => "required|numeric",
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }


}
