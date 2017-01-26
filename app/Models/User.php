<?php

namespace App\Models;

use Hash;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ["name", "email", "password", "isOnline"];

    protected  $hidden = ['password'];


    public static $rules = [
        "name" => "required|min:3",
        "email" => "required|email|unique:users,email",
        "password" => "required|min:6",
    ];

    /**
     * Automatically creates hash for the user password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function SoundMoji()
    {
        return $this->hasMany(SoundMoji::class);
    }

    public function channel()
    {
        return $this->belongsToMany(Channel::class);
    }


}
