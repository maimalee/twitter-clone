<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->where('user_id', '!=', Auth::id())
            ->inRandomOrder()->limit(5)
            ->get();
        $posts = Post::query()
            ->select(['posts.*', 'users.first_name as fname', 'users.username as uname'])
            ->join('users', 'users.user_id', 'posts.user_id')
            ->where('users.role', '!=', 'admin')
            ->where('posts.user_id', '!=', Auth::id())
            ->get();

        return view('home',[
            'posts' => $posts,
            'users' => $users,
        ]);
    }

    public function retweet($id)
    {
        $data = Post::query()->find($id);
        $post = Post::query()->create([
            'user_id' => Auth::id(),
            'post_type' => 'retweet',
            'parent_id'=> $id,
            'post_body' => $data['post_body'],
        ]);
        return redirect()->back();
    }

    public function quoteTweet($id, Request $request)
    {
        $data = Post::query()->find($id);
        if (empty($data)){
            return redirect()->back();
        }
        $quoteTweet = $request->validate([
            'post_body' => ['required'],
        ]);
        $post = Post::query()->create([
            'user_id' => Auth::id(),
            'post_type' => 'quoteTweet',
            'parent_id'=> $id,
            'post_body' => $quoteTweet['post_body'],
        ]);
        return redirect()->back();
    }
    public function comment($id)
    {

    }

}
