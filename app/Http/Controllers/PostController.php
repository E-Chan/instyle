<?php

namespace Instyle\Http\Controllers;

use Illuminate\Http\Request;

use Instyle\Http\Requests;
use Instyle\Http\Controllers\Controller;
use Instyle\Post;

class PostController extends Controller
{

    public function index(Request $request, Post $post)
    {
        $allPosts = $post->whereIn('user_id', 
            $request->user()->following()->lists('users.id')->push($request->user()->id) //colection laravel con nuestra ID pusheada
        )->with('user');
        $count =  $allPosts->count();
        $posts = $allPosts
        ->groupBy('posts.id')->orderBy('created_at','desc')
             ->take($request->get('limit', 20)) //Fetch limit
             ->get();

        return response()->json([
            'posts' => $posts,
            'total' =>$count,
            ]);
    }
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
