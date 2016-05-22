<?php

namespace Instyle\Http\Controllers;

use Illuminate\Http\Request;

use Instyle\Http\Requests;
use Instyle\Http\Controllers\Controller;
use Instyle\Post;

class PostController extends Controller
{
    public function create(Request $request, Post $post)
    {
        $this->validate($request, [
            'body' => 'required|max:600',
        ]);

        $createdPost = $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        return response()->json($post->with('user')->find($createdPost->id));
    }
}
