<?php

namespace App\QueryBuilders;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostQueryBuilder
{
    public function filterReply(int $postId): Builder
    {
        return $this->all()
            ->where('post_type', 'reply')
            ->where('posts.parent_id', $postId);
    }

    public function all(): Builder
    {
        return $this->builder();
    }

    public function findById(int $id): Builder
    {
        return $this->all()->where('posts.post_id', $id);
    }

    public function builder(): Builder
    {
        return Post::query()
            ->select(['posts.*', 'users.first_name as fname', 'users.username as uname'])
            ->join('users', 'users.user_id', 'posts.user_id')
            ->orderByDesc('post_id');
    }
}
