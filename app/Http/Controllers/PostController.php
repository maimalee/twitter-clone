<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(
        protected readonly PostRepository $repository,
    )
    {
    }

    public function index(): Factory|View|Application
    {
        $users = User::query()
            ->where('user_id', '!=', Auth::id())
            ->inRandomOrder()->limit(5)
            ->get();

        $posts = $this->repository->all();
        foreach ($posts as $post) {
            $post['top_comments'] = $this->repository->getComments(
                postId: $post['post_id'],
                limit: 3
            );
        }

        return view('home',[
            'posts' => $posts,
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'post_body' => ['required'],
        ]);
        $post = Post::query()->create([
            'user_id' => Auth::id(),
            'post_type' => 'tweet',
            'post_body' => $data['post_body'],
        ]);
        return redirect()->back();
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
            'post_type' => 'reply',
            'parent_id'=> $id,
            'post_body' => $quoteTweet['post_body'],
        ]);
        return redirect()->back();
    }
    public function comment($id)
    {

    }

}
