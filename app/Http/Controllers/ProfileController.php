<?php

namespace Instyle\Http\Controllers;

use Illuminate\Http\Request;
use Instyle\Models\User;

class ProfileController extends Controller
{
    public function getprofile($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user){
            abort(404);
        }
        return view('profile.index')
            ->with('user',$user);

    }
}