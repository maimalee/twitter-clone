<?php

namespace App\Repositories;

use App\Models\Post;
use App\QueryBuilders\PostQueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostRepository
{
    public function __construct(
        public readonly PostQueryBuilder $queryBuilder,
    )
    {
    }


    /**
     * @param int|null $limit
     * @return Collection
     */
    public function all(?int $limit = null): Collection
    {
        $builder = $this->queryBuilder->all();

        if ($limit) {
            $builder->limit($limit);
        }

        return $builder->get();
    }

    public function findById(int $id): Model|Post|null
    {
        return $this->queryBuilder->findById($id)->first();
    }

    /**
     * @param int $postId
     * @param int $limit
     * @return Collection
     */
    public function getComments(int $postId, int $limit = 10): Collection
    {
        return $this->queryBuilder
            ->filterReply($postId)
            ->limit($limit)
            ->get();
    }

}
