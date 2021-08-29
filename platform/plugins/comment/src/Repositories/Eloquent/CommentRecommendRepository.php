<?php

namespace Platform\Comment\Repositories\Eloquent;

use Platform\Comment\Repositories\Interfaces\CommentRecommendInterface;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Arr;

class CommentRecommendRepository extends RepositoriesAbstract implements CommentRecommendInterface
{
    /**
     * @inheritDoc
     */
    public function getRecommendOfArticle(array $reference, $user)
    {
        $isRecommended = false;
        $params = Arr::only($reference, [
            'reference_type', 'reference_id'
        ]);

        if ($user && $this->getFirstBy(array_merge($params, ['user_id' => $user->id]))) {
            $isRecommended = true;
        }

        $count = $this->count($params);

        return compact('isRecommended', 'count');
    }
}
