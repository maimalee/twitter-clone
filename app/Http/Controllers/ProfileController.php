<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::query()
            ->find($id);

        $posts = Post::query()
            ->select(['posts.*', 'users.profile as profile'])
            ->join('users', 'users.user_id', 'posts.user_id')
            ->where('posts.user_id', $id)
            ->orderByDesc('post_id')
            ->get();
        $totalPost = $posts->count();
        return view('profile.index',[
            'user' => $user,
            'posts' => $posts,
            'totalPost' => $totalPost,
        ]);
   }

    public function edit()
    {
        $id = Auth::id();
        $user = User::query()->find($id);
        return view('profile.edit',[
            'user' => $user,
        ]);
   }
}
