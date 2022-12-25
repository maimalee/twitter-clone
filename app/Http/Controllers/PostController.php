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
            ->get();

        return view('home',[
            'posts' => $posts,
            'users' => $users,
        ]);
    }
}
