<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'background_color',
        'text_color'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function links() {
        return $this->hasMany(Link::class);
    }

    public function visits() {
        return $this->hasManyThrough(Visit::class, Link::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

}
