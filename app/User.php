<?php

namespace Instyle;

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

    protected $appends = [
        'avatar',
        'profileUrl',
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
    $hash = md5(strtolower(trim($this->attributes['email'])));
    return "http://www.gravatar.com/avatar/$hash?d=https://u.pomf.is/maqope.png";
    }

    public function posts()
    {
        return $this->hasMany('Instyle\Post');
    }

    public function getAvatarAttribute()
    {
        return $this->getAvatarUrl();
    }

    public function index(User $user)
    {
        return view('users.index')->withUser($user);
    }

    public function getProfileUrlAttribute()
    {
        return route('profile.index', $this);
    }

    public function isNot(User $user)
    {
        return $this->id !== $user->id;
    }

    public function isFollowing(User $user)
    {
        return $this->following->where('id',$user->id)->count();
    }

    public function canFollow(User $user)
    {
        if ($this->isNot($user))
        {
            return false;
        }

        return !$this->isFollowing($user);
    }

    public function following()
    {
        return $this->belongsToMany('Instyle\Models\User', 'follows', 'user_id', 'follower_id');
    }

    public function follow(Request $request, User $user)
    {
        //if ($request->user()->canFollow($user))
        //{
            $request->user()->following()->attach($user);
        //}

        return redirect()->back();
    }


    public function unfollow(Request $request, User $user)
    {
        if ($request->user()->canUnfollow($user)) {
            $request->user()->following()->detach($user);
        }

        return redirect()->back();
    }
}


