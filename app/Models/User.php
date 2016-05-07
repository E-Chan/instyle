<?php

namespace Instyle\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';

    protected $fillable = [
        'username', 
        'email', 
        'password',
        'first_name', 
        'last_name',
        'location',
    ];


    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function getName()
    {
        if($this->first_name && $this->last_name)
        {
            return "{$this->first_name} {$this->last_name}";
        }
        if ($this->first_name)
        {
            return $this->first_name;
        }
        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFirstNameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }

    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email)?s=10&d=https://u.pomf.is/maqope.png}}";
    }
}
